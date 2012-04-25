package ru.mmb.terminal.db;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import ru.mmb.terminal.conf.Configuration;
import ru.mmb.terminal.model.Level;
import ru.mmb.terminal.model.LevelPoint;
import ru.mmb.terminal.model.Participant;
import ru.mmb.terminal.model.PointType;
import ru.mmb.terminal.model.Team;
import ru.mmb.terminal.util.DateFormat;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

public class Withdraw
{
	private static final String TABLE_DISMISS = "TeamLevelDismiss";
	private static final String TABLE_LEVELPOINTS = "LevelPoints";
	private static final String TABLE_LEVELS = "Levels";
	private static final String TABLE_TEAM_USERS = "TeamUsers";

	private static final String DISMISS_DATE = "teamleveldismiss_date";
	private static final String DEVICE_ID = "device_id";
	private static final String USER_ID = "user_id";
	private static final String TEAM_ID = "team_id";
	private static final String LEVELPOINT_ID = "levelpoint_id";
	private static final String TEAMUSER_ID = "teamuser_id";
	private static final String LEVEL_ID = "level_id";
	private static final String LEVEL_ORDER = "level_order";

	private static final String TEMPLATE_TEAMUSER_ID = "%teamuser_id%";

	private final SQLiteDatabase db;

	public Withdraw(SQLiteDatabase db)
	{
		this.db = db;
	}

	public List<Participant> getWithdrawnMembers(LevelPoint levelPoint, Level level, Team team)
	{
		List<Participant> result = new ArrayList<Participant>();
		String sql =
		    "select distinct tu." + USER_ID + ", lp." + LEVELPOINT_ID + ", l." + LEVEL_ORDER
		            + " from " + TABLE_DISMISS + " as d join " + TABLE_LEVELPOINTS
		            + " as lp on (d." + LEVELPOINT_ID + " = lp." + LEVELPOINT_ID + ") join "
		            + TABLE_LEVELS + " as l on (lp." + LEVEL_ID + " = l." + LEVEL_ID + ") join "
		            + TABLE_TEAM_USERS + " as tu on (d." + TEAMUSER_ID + " = tu." + TEAMUSER_ID
		            + ") where d." + TEAM_ID + " = " + team.getTeamId() + " and l." + LEVEL_ORDER
		            + " <= " + level.getLevelOrder();
		Cursor resultCursor = db.rawQuery(sql, null);

		resultCursor.moveToFirst();
		while (!resultCursor.isAfterLast())
		{
			int participantId = resultCursor.getInt(0);
			int levelPointId = resultCursor.getInt(1);
			int levelOrder = resultCursor.getInt(2);
			if (isDBLevelPointEarlier(levelPoint, level, levelPointId, levelOrder))
			{
				Participant member = team.getMember(participantId);
				if (!result.contains(member))
				{
					result.add(member);
				}
			}
			resultCursor.moveToNext();
		}
		resultCursor.close();

		return result;
	}

	private boolean isDBLevelPointEarlier(LevelPoint currLevelPoint, Level currLevel,
	        int dbLevelPointId, int dbLevelOrder)
	{
		if (currLevel.getLevelOrder() > dbLevelOrder) return true;
		if (currLevelPoint.getPointType() == PointType.FINISH) return true;
		if (currLevelPoint.getPointType() == PointType.START
		        && currLevelPoint.getLevelPointId() == dbLevelPointId) return true;
		return false;
	}

	public void saveWithdrawnMembers(LevelPoint levelPoint, Level level, Team team,
	        List<Participant> withdrawnMembers)
	{
		String selectSql =
		    "select count(*) from " + TABLE_DISMISS + " where " + USER_ID + " = "
		            + Configuration.getInstance().getUserId() + " and " + LEVELPOINT_ID + " = "
		            + levelPoint.getLevelPointId() + " and " + TEAM_ID + " = " + team.getTeamId()
		            + " and " + TEAMUSER_ID + " = " + TEMPLATE_TEAMUSER_ID;
		String insertSql =
		    "insert into " + TABLE_DISMISS + "(" + DISMISS_DATE + ", " + DEVICE_ID + ", " + USER_ID
		            + ", " + LEVELPOINT_ID + ", " + TEAM_ID + ", " + TEAMUSER_ID + ") values (?, "
		            + Configuration.getInstance().getDeviceId() + ", "
		            + Configuration.getInstance().getUserId() + ", " + levelPoint.getLevelPointId()
		            + ", " + team.getTeamId() + ", ?)";
		db.beginTransaction();
		try
		{
			for (Participant member : withdrawnMembers)
			{
				if (isRecordExists(selectSql, member)) continue;
				db.execSQL(insertSql, new Object[] { DateFormat.format(new Date()),
				        new Integer(member.getTeamUserId()) });
			}
			db.setTransactionSuccessful();
		}
		finally
		{
			db.endTransaction();
		}
	}

	private boolean isRecordExists(String selectSql, Participant member)
	{
		Cursor resultCursor =
		    db.rawQuery(selectSql.replace(TEMPLATE_TEAMUSER_ID, Integer.toString(member.getTeamUserId())), null);
		resultCursor.moveToFirst();
		int recordCount = resultCursor.getInt(0);
		resultCursor.close();
		return recordCount > 0;
	}
}
