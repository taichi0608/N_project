<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained()->onUpdate('cascade');
            
            $table->char('TenantCode');
            $table->integer('TenantBranch');
            $table->integer('SectionCode');
            $table->integer('SummarySectionCode');
            $table->char('SummarySectionName');
            $table->char('SummarySectionAbName');
            $table->boolean('Hidden');
            $table->integer('DisplayOrder');
            $table->integer('UpdatePerson');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('summaries');
    }
}
