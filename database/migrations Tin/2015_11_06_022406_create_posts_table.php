<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('posts', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title')->unique();
			$table->longText('content');
			$table->string('image');
			$table->integer('cate-id')->unsigned();
			$table->foreign('cate-id')->references('id')->on('categories')->onDelete('cascade');
			$table->integer('tag-id')->unsigned();
			$table->foreign('tag-id')->references('id')->on('tags');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('posts');
	}

}
