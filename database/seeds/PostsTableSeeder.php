<?php

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag1 = Tag::create([
            'name' => 'Record',
        ]);
        $tag2 = Tag::create([
            'name' => 'Progress',
        ]);
        $tag3 = Tag::create([
            'name' => 'Customers',
        ]);
        $tag4 = Tag::create([
            'name' => 'Freebie',
        ]);
        $tag5 = Tag::create([
            'name' => 'Offer',
        ]);
        $tag6 = Tag::create([
            'name' => 'Screenshot',
        ]);
        $tag7 = Tag::create([
            'name' => 'Milestone',
        ]);
        $tag8 = Tag::create([
            'name' => 'Version',
        ]);
        $tag9 = Tag::create([
            'name' => 'Design',
        ]);
        $tag10 = Tag::create([
            'name' => 'Customers',
        ]);
        $tag11 = Tag::create([
            'name' => 'Job',
        ]);


        $category1 = Category::create([
            'name' => 'News',
        ]);
        $category2 = Category::create([
            'name' => 'Design',
        ]);
        $category3 = Category::create([
            'name' => 'Partnership',
        ]);
        $category4 = Category::create([
            'name' => 'Hiring',
        ]);
        $category5 = Category::create([
            'name' => 'Updates',
        ]);
        $category6 = Category::create([
            'name' => 'Marketing',
        ]);
        $category7 = Category::create([
            'name' => 'Product',
        ]);
        $category8 = Category::create([
            'name' => 'Offers',
        ]);

        $author1 = User::create([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => Hash::make('password'),
        ]);
        $author2 = User::create([
            'name' => 'Adam Smith',
            'email' => 'adam@smith.com',
            'password' => Hash::make('password'),
        ]);
        $author3 = User::create([
            'name' => 'Vladimir Lenin',
            'email' => 'vladimir@lenin.su',
            'password' => Hash::make('password'),
        ]);

        $post1 = $author1->posts()->create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Ut a nisl id ante tempus hendrerit. Maecenas nec odio et ante tincidunt tempus. Phasellus nec sem in justo pellentesque facilisis. Sed hendrerit. Aliquam lobortis.',
            'content' => 'Nullam cursus lacinia erat. Sed hendrerit. Donec sodales sagittis magna. Quisque libero metus, condimentum nec, tempor a, commodo mollis, magna. Nullam sagittis. Morbi ac felis. Praesent ut ligula non mi varius sagittis. Aenean commodo ligula eget dolor. Cras sagittis. Suspendisse potenti.',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg',
        ]);
        $post2 = $author2->posts()->create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'Ut a nisl id ante tempus hendrerit. Maecenas nec odio et ante tincidunt tempus. Phasellus nec sem in justo pellentesque facilisis. Sed hendrerit. Aliquam lobortis.',
            'content' => 'Nullam cursus lacinia erat. Sed hendrerit. Donec sodales sagittis magna. Quisque libero metus, condimentum nec, tempor a, commodo mollis, magna. Nullam sagittis. Morbi ac felis. Praesent ut ligula non mi varius sagittis. Aenean commodo ligula eget dolor. Cras sagittis. Suspendisse potenti.',
            'category_id' => $category6->id,
            'image' => 'posts/2.jpg',
        ]);
        $post3 = $author3->posts()->create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'Ut a nisl id ante tempus hendrerit. Maecenas nec odio et ante tincidunt tempus. Phasellus nec sem in justo pellentesque facilisis. Sed hendrerit. Aliquam lobortis.',
            'content' => 'Nullam cursus lacinia erat. Sed hendrerit. Donec sodales sagittis magna. Quisque libero metus, condimentum nec, tempor a, commodo mollis, magna. Nullam sagittis. Morbi ac felis. Praesent ut ligula non mi varius sagittis. Aenean commodo ligula eget dolor. Cras sagittis. Suspendisse potenti.',
            'category_id' => $category2->id,
            'image' => 'posts/3.jpg',
        ]);
        $post4 = $author1->posts()->create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'Ut a nisl id ante tempus hendrerit. Maecenas nec odio et ante tincidunt tempus. Phasellus nec sem in justo pellentesque facilisis. Sed hendrerit. Aliquam lobortis.',
            'content' => 'Nullam cursus lacinia erat. Sed hendrerit. Donec sodales sagittis magna. Quisque libero metus, condimentum nec, tempor a, commodo mollis, magna. Nullam sagittis. Morbi ac felis. Praesent ut ligula non mi varius sagittis. Aenean commodo ligula eget dolor. Cras sagittis. Suspendisse potenti.',
            'category_id' => $category4->id,
            'image' => 'posts/4.jpg',
        ]);
        $post5 = $author2->posts()->create([
            'title' => 'New published books to read by a product designer',
            'description' => 'Ut a nisl id ante tempus hendrerit. Maecenas nec odio et ante tincidunt tempus. Phasellus nec sem in justo pellentesque facilisis. Sed hendrerit. Aliquam lobortis.',
            'content' => 'Nullam cursus lacinia erat. Sed hendrerit. Donec sodales sagittis magna. Quisque libero metus, condimentum nec, tempor a, commodo mollis, magna. Nullam sagittis. Morbi ac felis. Praesent ut ligula non mi varius sagittis. Aenean commodo ligula eget dolor. Cras sagittis. Suspendisse potenti.',
            'category_id' => $category7->id,
            'image' => 'posts/5.jpg',
        ]);
        $post6 = $author3->posts()->create([
            'title' => 'This is why it\'s time to ditch dress codes at work',
            'description' => 'Ut a nisl id ante tempus hendrerit. Maecenas nec odio et ante tincidunt tempus. Phasellus nec sem in justo pellentesque facilisis. Sed hendrerit. Aliquam lobortis.',
            'content' => 'Nullam cursus lacinia erat. Sed hendrerit. Donec sodales sagittis magna. Quisque libero metus, condimentum nec, tempor a, commodo mollis, magna. Nullam sagittis. Morbi ac felis. Praesent ut ligula non mi varius sagittis. Aenean commodo ligula eget dolor. Cras sagittis. Suspendisse potenti.',
            'category_id' => $category5->id,
            'image' => 'posts/6.jpg',
        ]);

        $post1->tags()->attach([
            $tag1->id,
            $tag4->id,
            $tag11->id,
            $tag9->id,
        ]);
        $post2->tags()->attach([
            $tag2->id,
            $tag3->id,
            $tag10->id,
            $tag11->id,
        ]);
        $post3->tags()->attach([
            $tag4->id,
            $tag5->id,
            $tag6->id,
            $tag9->id,
        ]);
        $post4->tags()->attach([
            $tag1->id,
            $tag8->id,
            $tag9->id,
            $tag10->id,
        ]);
        $post5->tags()->attach([
            $tag5->id,
            $tag4->id,
            $tag6->id,
            $tag9->id,
        ]);
        $post6->tags()->attach([
            $tag10->id,
            $tag4->id,
            $tag11->id,
            $tag9->id,
        ]);
    }
}
