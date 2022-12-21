<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->char('TenantCode');
            $table->integer('TenantBranch');
            $table->integer('SectionCode');
            $table->char('SectionName');
            $table->char('SectionAbName');
            $table->integer('PayFor');
            $table->boolean('Hidden');
            $table->integer('DisplayOrde');
            $table->timestamps();
            $table->integer('UpdatePerson');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
