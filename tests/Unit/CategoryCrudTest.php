<?php

namespace Tests\Unit;

use App\Models\Category;
// use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryCrudTest extends TestCase
{
    use RefreshDatabase;

    // public function setUp()
    // {
    //   parent::setUp();

    // }
    /**
     * Test performance of creating categories.
     *
     * @return void
     */
    public function testCreateCategoriesPerformance()
    {
        $start = microtime(true);

        Category::factory()->count(1000)->create();

        $end = microtime(true);
        $executionTime = $end - $start;

        $this->assertTrue($executionTime < 10, 'Creating 1000 categories took more than 10 seconds.');
    }

    /**
     * Test performance of reading categories.
     *
     * @return void
     */
    public function testReadCategoriesPerformance()
    {
        Category::factory()->count(1000)->create();

        $start = microtime(true);

        $categories = Category::all();

        $end = microtime(true);
        $executionTime = $end - $start;

        $this->assertTrue($executionTime < 5, 'Reading 1000 categories took more than 5 seconds.');
    }

    /**
     * Test performance of updating categories.
     *
     * @return void
     */
    public function testUpdateCategoriesPerformance()
    {
        $categories = Category::factory()->count(20)->create();

        $start = microtime(true);

        foreach ($categories as $index => $category) {
            $category->update(['name' => 'Updated Category Name ' . ($index + 1)]);
        }

        $end = microtime(true);
        $executionTime = $end - $start;

        $this->assertTrue($executionTime < 5, 'Updating 1000 categories took more than 10 seconds.');
    }

    /**
     * Test performance of deleting categories.
     *
     * @return void
     */
    public function testDeleteCategoriesPerformance()
    {
        // Créer 1000 catégories
        $categories = Category::factory()->count(1000)->create();

        $start = microtime(true);

        // Supprimer toutes les catégories
        Category::destroy($categories->pluck('id')->toArray());

        $end = microtime(true);
        $executionTime = $end - $start;

        $this->assertTrue($executionTime < 3, 'Deleting 1000 categories took more than 5 seconds.');
    }

    public function test_example(): void
    {
        $this->assertTrue(true);
    }
}
