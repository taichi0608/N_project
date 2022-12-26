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
            $table->char('TenantCode');//データなし
            $table->integer('TenantBranch');//データなし
            $table->integer('SectionCode');
            $table->char('SectionName');
            $table->char('SectionAbName');
            $table->char('PayFor');
            $table->integer('DisplayOrder');
            $table->char('Hidden');
            $table->timestamps();
            $table->integer('UpdatePerson');//データなし
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
