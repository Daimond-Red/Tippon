<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPermissionGroupIdToPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permissions', function (Blueprint $table) {

            $table->unsignedInteger('permission_group_id')->nullable();
            $table->foreign('permission_group_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->string('display_name')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permissions', function (Blueprint $table) {

            $table->dropForeign('permissions_permission_group_id_foreign');
            $table->dropColumn('permission_group_id');
            $table->dropColumn('display_name');

        });
    }
}
