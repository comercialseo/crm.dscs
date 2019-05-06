<?php
	foreach ($events as $event) {
		$content = $this->Html->link($event->title, ['action' => 'view', $event->id]);
		$this->Calendar->addRow($event->date, $content, ['class' => 'event']);
	}

	echo $this->Calendar->render();
?>

<?php if (!$this->Calendar->isCurrentMonth()) { ?>
	<?php echo $this->Html->link(__('Jump to the current month') . '...', ['action' => 'index'])?>
<?php } ?>