<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('prj')->unique();
            $table->foreignId('user_id')->nullable();
            $table->string('file_ho')->nullable();
            $table->string('project_title')->nullable();
            $table->string('quantity')->nullable();
            $table->string('po_number')->unique();
            $table->string('costumer')->nullable();
            $table->string('project_type')->nullable();
            $table->date('date_of_po')->nullable();
            $table->date('due_date')->nullable();
            $table->bigInteger('project_value')->nullable();
            $table->bigInteger('remaining_reimbusment_fee')->nullable();
            $table->string('gross_margin')->nullable();
            $table->string('net_margin')->nullable();
            $table->string('irr')->nullable();
            $table->bigInteger('equipment')->nullable();
            $table->bigInteger('pmo_cost')->nullable();
            $table->bigInteger('opex')->nullable();
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
        Schema::dropIfExists('reports');
    }
}