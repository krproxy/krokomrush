<?php

Admin::model('krproxy\excurso\Models\ExOrder')->title('Заказы')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('excursion_id')->label('Excursion_id'),
		Column::string('type')->label('Type'),
		Column::string('name')->label('Name'),
		Column::string('email')->label('Email'),
		Column::string('phone')->label('Phone'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('excursion_id', 'Excursion'),
		FormItem::ckeditor('type', 'Type'),
		FormItem::ckeditor('name', 'Name'),
		FormItem::ckeditor('email', 'Email'),
		FormItem::ckeditor('phone', 'Phone'),
	]);
	return $form;
});