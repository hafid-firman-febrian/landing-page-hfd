<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->json('categories')->nullable()->after('category');
        });

        DB::table('projects')->orderBy('id')->select('id', 'category')->each(function ($project) {
            DB::table('projects')->where('id', $project->id)->update([
                'categories' => $project->category ? json_encode([$project->category]) : null,
            ]);
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('category')->nullable()->after('slug');
        });

        DB::table('projects')->orderBy('id')->select('id', 'categories')->each(function ($project) {
            $categories = $project->categories ? json_decode($project->categories, true) : [];
            DB::table('projects')->where('id', $project->id)->update([
                'category' => $categories[0] ?? null,
            ]);
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('categories');
        });
    }
};
