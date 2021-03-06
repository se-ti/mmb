package ru.mmb.terminal.activity.input.data;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import ru.mmb.terminal.R;
import ru.mmb.terminal.model.Checkpoint;
import android.view.Gravity;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.LinearLayout;
import android.widget.TableLayout;
import android.widget.TableRow;
import android.widget.TextView;

public class CheckpointPanel
{
	private final InputDataActivity inputDataActivity;
	private final InputDataActivityState currentState;

	private final LinearLayout checkpointsTopPanel;
	private final TableLayout checkpointsPanel;
	private final Button btnCheckAll;
	private final Button btnCheckNothing;

	private final Map<Checkpoint, CheckBox> checkpointBoxes = new HashMap<Checkpoint, CheckBox>();
	private final Map<CheckBox, Checkpoint> boxCheckpoints = new HashMap<CheckBox, Checkpoint>();

	public CheckpointPanel(InputDataActivity context, InputDataActivityState currentState)
	{
		this.inputDataActivity = context;
		this.currentState = currentState;

		checkpointsTopPanel =
		    (LinearLayout) context.findViewById(R.id.inputData_checkpointsTopPanel);
		checkpointsPanel = (TableLayout) context.findViewById(R.id.inputData_checkpointsPanel);
		btnCheckAll = (Button) context.findViewById(R.id.inputData_checkAllButton);
		btnCheckNothing = (Button) context.findViewById(R.id.inputData_checkNothingButton);

		init();

		initCheckboxesState();

		btnCheckAll.setOnClickListener(new CheckAllClickListener());
		btnCheckNothing.setOnClickListener(new CheckNothingClickListener());
	}

	private void init()
	{
		if (!currentState.needInputCheckpoints())
		{
			checkpointsTopPanel.setLayoutParams(new LinearLayout.LayoutParams(ViewGroup.LayoutParams.MATCH_PARENT, 0));
		}
		else
		{
			createCheckpointBoxes();
		}
	}

	private void createCheckpointBoxes()
	{
		List<Checkpoint> checkpoints = currentState.getLevelPointForTeam().getCheckpoints();
		int checkpointsCount = checkpoints.size();
		int colCount = checkpointsCount / 2;
		if (checkpointsCount % 2 != 0) colCount += 1;

		int rowCount = 5;
		List<TableRow> rows = new ArrayList<TableRow>();
		for (int i = 0; i < rowCount; i++)
		{
			TableRow tableRow = new TableRow(inputDataActivity);
			rows.add(tableRow);
			checkpointsPanel.addView(tableRow);
		}

		buildCheckpointsRow(rows, 0, checkpoints, colCount);
		buildSeparatorRow(rows.get(2));
		buildCheckpointsRow(rows, 1, checkpoints, colCount);
	}

	private void buildSeparatorRow(TableRow tableRow)
	{
		TextView dummyText = new TextView(inputDataActivity);
		dummyText.setText("");
		tableRow.addView(dummyText);
	}

	private void buildCheckpointsRow(List<TableRow> rows, int rowIndex,
	        List<Checkpoint> checkpoints, int colCount)
	{
		int checkIndex = (rowIndex == 0) ? 0 : 4;
		int textIndex = (rowIndex == 0) ? 1 : 3;

		for (int i = 0; i < colCount; i++)
		{
			int checkpointIndex = (rowIndex == 0) ? i : i + colCount;
			TableRow checkRow = rows.get(checkIndex);
			TableRow textRow = rows.get(textIndex);
			if (checkpointIndex < checkpoints.size())
			{
				CheckBox checkpointBox = new CheckBox(inputDataActivity);
				TableRow.LayoutParams layoutParams = new TableRow.LayoutParams();
				layoutParams.weight = 1;
				checkpointBox.setLayoutParams(layoutParams);
				checkpointBox.setText("");
				checkpointBox.setChecked(false);
				checkpointBox.setOnClickListener(new CheckpointBoxClickListener());
				checkRow.addView(checkpointBox);
				checkpointBoxes.put(checkpoints.get(checkpointIndex), checkpointBox);
				boxCheckpoints.put(checkpointBox, checkpoints.get(checkpointIndex));

				TextView checkNameText = new TextView(inputDataActivity);
				checkNameText.setText(checkpoints.get(checkpointIndex).getCheckpointName());
				layoutParams = new TableRow.LayoutParams();
				layoutParams.weight = 1;
				layoutParams.gravity = Gravity.CENTER_HORIZONTAL;
				checkNameText.setLayoutParams(layoutParams);
				textRow.addView(checkNameText);
			}
			else
			{
				addDummyControls(checkRow, textRow);
			}
		}
	}

	private void addDummyControls(TableRow checkRow, TableRow textRow)
	{
		TextView dummy = new TextView(inputDataActivity);
		dummy.setText("");
		TableRow.LayoutParams layoutParams = new TableRow.LayoutParams();
		layoutParams.weight = 1;
		dummy.setLayoutParams(layoutParams);
		checkRow.addView(dummy);

		dummy = new TextView(inputDataActivity);
		dummy.setText("");
		dummy.setLayoutParams(layoutParams);
		textRow.addView(dummy);
	}

	private void initCheckboxesState()
	{
		if (!currentState.needInputCheckpoints()) return;

		List<Checkpoint> checkpoints = currentState.getLevelPointForTeam().getCheckpoints();
		for (Checkpoint checkpoint : checkpoints)
		{
			CheckBox checkBox = checkpointBoxes.get(checkpoint);
			checkBox.setChecked(currentState.isChecked(checkpoint));
		}
	}

	private class CheckpointBoxClickListener implements OnClickListener
	{
		@Override
		public void onClick(View v)
		{
			Checkpoint checkpoint = boxCheckpoints.get(v);
			currentState.setChecked(checkpoint, ((CheckBox) v).isChecked());
		}
	}

	private class CheckAllClickListener implements OnClickListener
	{
		@Override
		public void onClick(View v)
		{
			for (Map.Entry<Checkpoint, CheckBox> entry : checkpointBoxes.entrySet())
			{
				entry.getValue().setChecked(true);
			}
			currentState.checkAll();
		}
	}

	private class CheckNothingClickListener implements OnClickListener
	{
		@Override
		public void onClick(View v)
		{
			for (Map.Entry<Checkpoint, CheckBox> entry : checkpointBoxes.entrySet())
			{
				entry.getValue().setChecked(false);
			}
			currentState.uncheckAll();
		}
	}
}
