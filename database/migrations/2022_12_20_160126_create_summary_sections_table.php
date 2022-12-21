<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummarySectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summary_sections', function (Blueprint $table) {
            $table->id();
            $table->char('TenantCode');
            $table->integer('TenantBranch');
            $table->integer('SectionCode');
            $table->integer('SummarySectionCode');
            $table->char('SummarySectionName');
            $table->char('SummarySectionAbName');
            $table->boolean('Hidden');
            $table->integer('DisplayOrder');
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
        Schema::dropIfExists('summary_sections');
    }
}
