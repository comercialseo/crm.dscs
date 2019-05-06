<?php
	foreach ($appEventos as $appEvento) {
		$content = $this->Html->link($appEvento->ev_evento, ['action' => 'ver', $appEvento->id]);
		$this->Calendar->addRow($appEvento->ev_comienzo, $content, ['class' => 'event']);
	}

	echo $this->Calendar->render();
?>

<?php if (!$this->Calendar->isCurrentMonth()) { ?>
	<?php echo $this->Html->link(__('Jump to the current month') . '...', ['action' => 'index'])?>
<?php } ?>