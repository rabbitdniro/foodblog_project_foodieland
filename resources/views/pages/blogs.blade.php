<!DOCTYPE html>
<html lang="en" style="background-color: #000000;">
    <head>
        @include('components.head')
    </head>
    <body>
        @include('components.header2')

        <!-- Hero -->
        <section id="blog-hero" class="hero-wrap hero-wrap-2">
            <div class="hero-overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-9 text-center hero-content">
                        <span class="hero-kicker">Discover Something Delicious</span>
                        <h1>Stories, Tips, and Recipes from the Foodieland Kitchen</h1>
                        <p>Fresh flavours, behind-the-scenes stories, and meal inspiration curated by our editors every week.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Search + Filter Controls -->
        <section class="ftco-section blog-controls">
            <div class="container">
                <div class="blog-toolbar">
                    <form class="blog-search" action="#" method="GET">
                        <div class="search-field">
                            <i class="icon-search"></i>
                            <input type="text" name="q" placeholder="Search articles, tips, recipes…" aria-label="Search blog" />
                        </div>
                        <button type="submit" class="btn btn-dark">Search</button>
                    </form>
                    <div class="blog-categories">
                        <button type="button" class="category-pill active">All</button>
                        <button type="button" class="category-pill">Healthy</button>
                        <button type="button" class="category-pill">Behind the Scenes</button>
                        <button type="button" class="category-pill">Comfort Food</button>
                        <button type="button" class="category-pill">Lifestyle</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog List -->
        <section class="ftco-section bg-light pt-0">
            <div class="container">
                <div class="blog-layout">
                    <div class="blog-main">
                        <div class="blog-list">
                            @php
                                $blogPosts = [
                                    [
                                            'image' => 'image_4.jpg',
                                            'category' => 'Noodles',
                                            'title' => 'Vietnamese Pho with Fresh Herbs and Chicken',
                                            'excerpt' => 'Simmer a fragrant broth, soften the rice noodles, and finish with crisp herbs for the ultimate comfort bowl.',
                                            'date' => 'Sept 02, 2019',
                                            'read_time' => '6 min read',
                                            'author' => 'Courtney Henry',
                                            'author_image' => 'person_1.jpg'
                                    ],
                                    [
                                            'image' => 'image_1.jpg',
                                            'category' => 'Healthy',
                                            'title' => 'Rainbow Superfood Smoothie Bowl',
                                            'excerpt' => 'Packed with berries, kiwi, and crunchy toppings—this smoothie bowl is a burst of color and nutrients.',
                                            'date' => 'Sept 06, 2019',
                                            'read_time' => '5 min read',
                                            'author' => 'Jenny Wilson',
                                            'author_image' => 'person_2.jpg'
                                    ],
                                    [
                                            'image' => 'image_5.jpg',
                                            'category' => 'Behind the scenes',
                                            'title' => 'Chef Antonio on the Art of Fire Cooking',
                                            'excerpt' => 'Go inside the kitchen to see how Chef Antonio balances bold flavors with show-stopping fire techniques.',
                                            'date' => 'Sept 10, 2019',
                                            'read_time' => '8 min read',
                                            'author' => 'Leslie Alexander',
                                            'author_image' => 'person_3.jpg'
                                    ],
                                    [
                                            'image' => 'image_6.jpg',
                                            'category' => 'Comfort food',
                                            'title' => 'Ultimate Crispy-Edge Lasagna Squares',
                                            'excerpt' => 'Layers of slow-simmered ragù, herbed ricotta, and golden cheese for a family-style classic.',
                                            'date' => 'Sept 18, 2019',
                                            'read_time' => '9 min read',
                                            'author' => 'Kristin Watson',
                                            'author_image' => 'person_4.jpg'
                                    ],
                                    [
                                            'image' => 'image_2.jpg',
                                            'category' => 'Plant-based',
                                            'title' => 'Chipotle Sweet Potato Burrito Bowls',
                                            'excerpt' => 'Roasted sweet potatoes, smoky beans, and avocado crema make this a hearty weeknight favorite.',
                                            'date' => 'Sept 24, 2019',
                                            'read_time' => '7 min read',
                                            'author' => 'Bessie Cooper',
                                            'author_image' => 'person_2.jpg'
                                    ],
                                    [
                                            'image' => 'image_3.jpg',
                                            'category' => 'Lifestyle',
                                            'title' => 'We’re Hiring: Communications Assistant',
                                            'excerpt' => 'Join the Food Land team and help craft stories, newsletters, and campaigns for food lovers everywhere.',
                                            'date' => 'Sept 30, 2019',
                                            'read_time' => '4 min read',
                                            'author' => 'Darlene Robertson',
                                            'author_image' => 'person_1.jpg'
                                    ],
                                ];
                            @endphp

                            @foreach ($blogPosts as $post)
                                <article class="blog-list-item">
                                    <div class="blog-list-media">
                                        <img src="assets/images/{{ $post['image'] }}" alt="{{ $post['title'] }}">
                                    </div>
                                    <div class="blog-list-content">
                                        <span class="blog-list-category">{{ $post['category'] }}</span>
                                        <h3 class="blog-list-title">{{ $post['title'] }}</h3>
                                        <p class="blog-list-excerpt">{{ $post['excerpt'] }}</p>
                                        <div class="blog-list-meta">
                                            <span><i class="icon-calendar"></i> {{ $post['date'] }}</span>
                                            <span><i class="icon-clock"></i> {{ $post['read_time'] }}</span>
                                        </div>
                                    </div>
                                    <div class="blog-list-author">
                                        <img src="assets/images/{{ $post['author_image'] }}" alt="{{ $post['author'] }}">
                                        <span>{{ $post['author'] }}</span>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <nav aria-label="Blog pagination" class="blog-pagination">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <span class="page-link">&laquo; Prev</span>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next &raquo;</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <aside class="blog-sidebar">
                        <div class="sidebar-card">
                            <span class="sidebar-label">Editor’s picks</span>
                            <h3>Most Popular Recipes</h3>
                            <p class="sidebar-intro">Handpicked dishes our readers cook on repeat, perfect for busy weeknights or relaxed weekends.</p>

                            @php
                                $popularRecipes = [
                                    [
                                        'rank' => '01',
                                        'title' => 'Meatball',
                                        'description' => 'Juicy beef meatballs tossed with herb salad and a smoky glaze.',
                                        'meta' => '30 min • 4 servings',
                                        'image' => 'dinner-3.jpg'
                                    ],
                                    [
                                        'rank' => '02',
                                        'title' => 'Spaghetti',
                                        'description' => 'Classic pasta with slow-simmered tomato sauce and garden basil.',
                                        'meta' => '25 min • 2 servings',
                                        'image' => 'dinner-2.jpg'
                                    ],
                                    [
                                        'rank' => '03',
                                        'title' => 'Potsticker Dumplings',
                                        'description' => 'Pan-seared pockets with gingered chicken filling and sesame dip.',
                                        'meta' => '35 min • 6 servings',
                                        'image' => 'lunch-4.jpg'
                                    ],
                                ];
                            @endphp

                            <div class="sidebar-list">
                                @foreach ($popularRecipes as $recipe)
                                    <article class="sidebar-item">
                                        <div class="sidebar-item-info">
                                            <span class="sidebar-item-rank">{{ $recipe['rank'] }}</span>
                                            <h4>{{ $recipe['title'] }}</h4>
                                            <p>{{ $recipe['description'] }}</p>
                                            <span class="sidebar-item-meta"><i class="icon-clock"></i> {{ $recipe['meta'] }}</span>
                                        </div>
                                        <div class="sidebar-item-media">
                                            <img src="assets/images/{{ $recipe['image'] }}" alt="{{ $recipe['title'] }}">
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        <!-- Newsletter Subscription Section -->
        <section class="ftco-section newsletter-section">
            <div class="container position-relative">
                <div class="newsletter-decor left"></div>
                <div class="newsletter-decor right"></div>
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="heading-section mb-5">
                            <h2 class="mb-3">Deliciousness to your inbox</h2>
                            <p>Subscribe to our newsletter and get the latest recipes, cooking tips, and exclusive food stories delivered directly to your email.</p>
                        </div>

                        <form action="#" method="POST" class="newsletter-form">
                            <div class="newsletter-controls">
                                <input type="email" class="form-control" placeholder="Your email address..." required />
                                <button type="submit" class="btn btn-dark">Subscribe</button>
                            </div>
                            <p class="privacy-note">We respect your privacy. Unsubscribe at any time.</p>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <style>
            body {
                background-color: #ffffff;
            }

            #blog-hero {
                position: relative;
                padding: 160px 0 130px;
                background: linear-gradient(120deg, rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.55)), url('assets/images/bg_4.jpg') center/cover no-repeat;
                color: #ffffff;
            }

            #blog-hero .hero-overlay {
                position: absolute;
                inset: 0;
                background: rgba(0, 0, 0, 0.25);
            }

            #blog-hero .hero-content {
                position: relative;
                z-index: 1;
            }

            #blog-hero .hero-kicker {
                display: inline-block;
                margin-bottom: 16px;
                padding: 8px 18px;
                border-radius: 999px;
                background: rgba(249, 109, 0, 0.18);
                color: #f96d00;
                font-weight: 600;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                font-size: 13px;
            }

            #blog-hero h1 {
                font-size: 52px;
                font-weight: 800;
                line-height: 1.2;
                margin-bottom: 18px;
            }

            #blog-hero p {
                font-size: 18px;
                color: rgba(255, 255, 255, 0.78);
                max-width: 720px;
                margin: 0 auto;
            }

            .blog-controls {
                padding-top: 0;
                margin-top: -60px;
            }

            .blog-toolbar {
                display: flex;
                flex-direction: column;
                gap: 22px;
                background: #ffffff;
                padding: 28px;
                border-radius: 28px;
                box-shadow: 0 20px 60px rgba(15, 15, 15, 0.08);
            }

            .blog-search {
                display: flex;
                gap: 16px;
                flex-wrap: wrap;
                align-items: center;
            }

            .blog-search .search-field {
                position: relative;
                flex: 1 1 320px;
                display: flex;
                align-items: center;
                background: #f6f6f6;
                border-radius: 16px;
                padding: 0 18px;
                height: 56px;
            }

            .blog-search .search-field input {
                flex: 1;
                border: none;
                background: transparent;
                font-size: 15px;
                font-weight: 500;
                color: #222;
            }

            .blog-search .search-field input:focus {
                outline: none;
                box-shadow: none;
            }

            .blog-search .search-field i {
                margin-right: 12px;
                color: #969696;
                font-size: 18px;
            }

            .blog-search .btn {
                height: 56px;
                padding: 0 34px;
                border-radius: 16px;
                font-weight: 600;
                letter-spacing: 0.02em;
            }

            .blog-categories {
                display: flex;
                flex-wrap: wrap;
                gap: 12px;
            }

            .category-pill {
                background: #f6f6f6;
                color: #444444;
                border: none;
                border-radius: 999px;
                padding: 10px 20px;
                font-size: 14px;
                font-weight: 600;
                transition: background 0.2s ease, color 0.2s ease, transform 0.2s ease;
            }

            .category-pill:hover {
                background: rgba(249, 109, 0, 0.16);
                color: #f96d00;
                transform: translateY(-2px);
            }

            .category-pill.active {
                background: #f96d00;
                color: #ffffff;
                box-shadow: 0 14px 26px rgba(249, 109, 0, 0.25);
            }

            .blog-layout {
                display: grid;
                grid-template-columns: minmax(0, 1fr) 340px;
                gap: 36px;
                align-items: start;
            }

            .blog-main {
                display: flex;
                flex-direction: column;
                gap: 34px;
            }

            .blog-sidebar {
                position: sticky;
                top: 120px;
            }

            .sidebar-card {
                background: #ffffff;
                color: #0f0f0f;
                border-radius: 36px;
                padding: 32px 30px;
                box-shadow: 0 30px 80px rgba(15, 15, 15, 0.12);
                display: flex;
                flex-direction: column;
                gap: 26px;
            }

            .sidebar-label {
                display: inline-block;
                padding: 6px 16px;
                border-radius: 999px;
                background: rgba(249, 109, 0, 0.12);
                color: #f96d00;
                font-size: 12px;
                letter-spacing: 0.12em;
                text-transform: uppercase;
                font-weight: 600;
            }

            .sidebar-card h3 {
                font-size: 26px;
                font-weight: 700;
                margin: 0;
            }

            .sidebar-intro {
                margin: 0;
                font-size: 14px;
                line-height: 1.7;
                color: #555555;
            }

            .sidebar-list {
                display: flex;
                flex-direction: column;
                gap: 18px;
            }

            .sidebar-item {
                display: flex;
                align-items: center;
                gap: 18px;
                background: #f7f7f7;
                border-radius: 26px;
                padding: 18px 20px;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .sidebar-item:hover {
                transform: translateY(-4px);
                background: #ffffff;
                box-shadow: 0 18px 36px rgba(15, 15, 15, 0.12);
            }

            .sidebar-item-info {
                flex: 1;
                display: flex;
                flex-direction: column;
                gap: 8px;
            }

            .sidebar-item-rank {
                font-size: 13px;
                font-weight: 700;
                letter-spacing: 0.14em;
                text-transform: uppercase;
                color: #c0c0c0;
            }

            .sidebar-item-info h4 {
                margin: 0;
                font-size: 20px;
                font-weight: 700;
                color: #161616;
            }

            .sidebar-item-info p {
                margin: 0;
                font-size: 13px;
                line-height: 1.5;
                color: #666666;
            }

            .sidebar-item-meta {
                font-size: 12px;
                color: #8a8a8a;
                display: inline-flex;
                align-items: center;
                gap: 6px;
            }

            .sidebar-item-meta i {
                color: #bbbbbb;
                margin-right: 0;
            }

            .sidebar-item-media img {
                width: 96px;
                height: 96px;
                object-fit: cover;
                border-radius: 22px;
                box-shadow: 0 18px 40px rgba(0, 0, 0, 0.14);
            }

            .blog-list {
                display: flex;
                flex-direction: column;
                gap: 28px;
            }

            .blog-list-item {
                display: flex;
                align-items: center;
                gap: 32px;
                background: #ffffff;
                border-radius: 34px;
                padding: 26px 32px;
                box-shadow: 0 28px 60px rgba(15, 15, 15, 0.08);
                transition: transform 0.25s ease, box-shadow 0.25s ease;
            }

            .blog-list-item:hover {
                transform: translateY(-6px);
                box-shadow: 0 36px 90px rgba(15, 15, 15, 0.12);
            }

            .blog-list-media img {
                width: 260px;
                height: 170px;
                object-fit: cover;
                border-radius: 26px;
            }

            .blog-list-content {
                display: flex;
                flex: 1;
                flex-direction: column;
                gap: 12px;
            }

            .blog-list-category {
                font-size: 13px;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.08em;
                color: #f96d00;
            }

            .blog-list-title {
                font-size: 24px;
                margin: 0;
                color: #161616;
                font-weight: 700;
            }

            .blog-list-excerpt {
                margin: 0;
                font-size: 15px;
                line-height: 1.6;
                color: #5f5f5f;
            }

            .blog-list-meta {
                display: flex;
                gap: 20px;
                font-size: 14px;
                color: #8a8a8a;
            }

            .blog-list-meta i {
                margin-right: 6px;
                color: #c3c3c3;
            }

            .blog-list-author {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 10px;
                min-width: 110px;
            }

            .blog-list-author img {
                width: 66px;
                height: 66px;
                border-radius: 50%;
                object-fit: cover;
                border: 4px solid #ffffff;
                box-shadow: 0 18px 30px rgba(15, 15, 15, 0.18);
            }

            .blog-list-author span {
                font-size: 13px;
                font-weight: 600;
                text-align: center;
                color: #333333;
            }

            .blog-pagination .page-item {
                margin: 0 6px;
            }

            .blog-pagination .page-link {
                min-width: 48px;
                height: 48px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 14px;
                border: 1px solid #d9d9d9;
                color: #333333;
                font-weight: 600;
                transition: all 0.2s ease;
            }

            .blog-pagination .page-link:hover {
                background: #161616;
                color: #ffffff;
                border-color: #161616;
            }

            .blog-pagination .page-item.active .page-link {
                background: #161616;
                color: #ffffff;
                border-color: #161616;
            }

            .blog-pagination .page-item.disabled .page-link {
                opacity: 0.4;
                cursor: default;
            }

            .newsletter-section {
                background: linear-gradient(135deg, #e8f4f8 0%, #f0fafb 100%);
                padding: 90px 20px;
                position: relative;
                overflow: hidden;
            }

            .newsletter-decor {
                position: absolute;
                top: 50%;
                width: 240px;
                height: 240px;
                opacity: 0.9;
                border-radius: 20px;
                transform: translateY(-50%);
                background-size: cover;
                background-position: center;
                z-index: 1;
            }

            .newsletter-decor.left {
                left: -90px;
                background-image: url('assets/images/about.jpg');
            }

            .newsletter-decor.right {
                right: -90px;
                background-image: url('assets/images/about-1.jpg');
            }

            .newsletter-section .container {
                position: relative;
                z-index: 2;
            }

            .newsletter-section h2 {
                font-size: 34px;
                font-weight: 700;
                color: #0f0f0f;
            }

            .newsletter-section p {
                font-size: 16px;
                color: #666666;
                line-height: 1.6;
            }

            .newsletter-controls {
                display: flex;
                gap: 12px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .newsletter-controls .form-control {
                flex: 1 1 280px;
                height: 52px;
                border-radius: 10px;
                border: 1px solid #d8d8d8;
                padding: 0 18px;
                font-size: 14px;
            }

            .newsletter-controls .btn {
                height: 52px;
                padding: 0 34px;
                border-radius: 10px;
                font-weight: 600;
            }

            .privacy-note {
                font-size: 12px;
                color: #969696;
                margin-top: 16px;
            }

            .navbar-toggler {
                color: #ffffff !important;
                align-items: center !important;
                gap: 8px !important;
                background: transparent !important;
                text-transform: uppercase;
                font-size: 14px !important;
                letter-spacing: 0.08em;
            }

            .navbar-toggler .menu-icon {
                position: relative;
                width: 20px;
                height: 2px;
                background: #ffffff;
                display: inline-block;
            }

            .navbar-toggler .menu-icon::before,
            .navbar-toggler .menu-icon::after {
                content: '';
                position: absolute;
                left: 0;
                width: 20px;
                height: 2px;
                background: #ffffff;
                transition: all 0.2s ease;
            }

            .navbar-toggler .menu-icon::before {
                top: -6px;
            }

            .navbar-toggler .menu-icon::after {
                top: 6px;
            }

            .navbar-toggler .menu-label {
                color: #ffffff !important;
                font-weight: 600;
            }

            @media (max-width: 991px) {
                .blog-layout {
                    grid-template-columns: 1fr;
                    gap: 28px;
                }

                .blog-main {
                    gap: 28px;
                }

                .sidebar-card {
                    border-radius: 30px;
                }

                .blog-sidebar {
                    top: 90px;
                }

                #blog-hero {
                    padding: 130px 0 120px;
                }

                #blog-hero h1 {
                    font-size: 38px;
                }

                .blog-toolbar {
                    padding: 24px;
                }

                .blog-list-item {
                    flex-direction: column;
                    align-items: flex-start;
                    padding: 24px;
                }

                .blog-list-media img {
                    width: 100%;
                    height: 220px;
                }

                .blog-list-meta {
                    flex-wrap: wrap;
                    gap: 12px;
                }

                .blog-list-author {
                    flex-direction: row;
                    align-items: center;
                    justify-content: flex-start;
                    width: 100%;
                }

                .blog-list-author span {
                    text-align: left;
                }
            }

            @media (max-width: 768px) {
                .blog-sidebar {
                    position: static;
                }

                #blog-hero {
                    margin-top: 110px;
                }

                #blog-hero h1 {
                    font-size: 32px;
                }

                .blog-toolbar {
                    gap: 18px;
                }

                .blog-search {
                    flex-direction: column;
                    align-items: stretch;
                }

                .blog-search .search-field {
                    width: 100%;
                }

                .blog-search .btn {
                    width: 100%;
                }

                .blog-categories {
                    justify-content: flex-start;
                }

                .blog-list-item {
                    padding: 22px;
                }

                .blog-pagination .page-link {
                    min-width: 42px;
                    height: 42px;
                }

                .newsletter-controls {
                    flex-direction: column;
                }

                .newsletter-controls .btn {
                    width: 100%;
                }

                .newsletter-decor {
                    display: none;
                }

                .sidebar-item {
                    padding: 18px;
                }

                .navbar {
                    padding: 10px 0 !important;
                }

                .navbar-brand {
                    font-size: 20px !important;
                }

                .navbar-toggler {
                    border: 1px solid #fff !important;
                    padding: 5px 12px !important;
                    border-radius: 6px !important;
                    display: flex !important;
                    align-items: center !important;
                }

                .navbar-collapse {
                    background: #000000 !important;
                    padding: 15px !important;
                    margin-top: 10px !important;
                    border-radius: 8px !important;
                    width: 100% !important;
                }

                .navbar-collapse.show {
                    display: block !important;
                }

                .navbar-collapse.collapse:not(.show) {
                    display: none !important;
                }

                #ftco-nav {
                    flex-direction: column !important;
                    align-items: flex-start !important;
                    width: 100% !important;
                }

                .navbar-nav {
                    flex-direction: column !important;
                    width: 100% !important;
                    margin: 0 !important;
                    padding: 0 !important;
                }

                .navbar-nav .nav-item {
                    display: block !important;
                    width: 100% !important;
                    margin: 0 !important;
                    border-bottom: 1px solid #333333 !important;
                }

                .navbar-nav .nav-item:last-child {
                    border-bottom: none !important;
                }

                .navbar-nav .nav-link {
                    padding: 12px 15px !important;
                    display: block !important;
                    width: 100% !important;
                    color: #ffffff !important;
                }

                .navbar-nav .nav-item.cta .nav-link {
                    margin-top: 10px !important;
                    text-align: center !important;
                    border-radius: 8px !important;
                }
            }

            @media (max-width: 576px) {
                .sidebar-item {
                    flex-direction: column;
                    align-items: flex-start;
                }

                .sidebar-item-media img {
                    width: 100%;
                    height: 180px;
                    border-radius: 20px;
                }

                #blog-hero {
                    padding: 120px 0 110px;
                }

                #blog-hero h1 {
                    font-size: 28px;
                }

                .container {
                    padding-left: 18px !important;
                    padding-right: 18px !important;
                }

                .blog-list-item {
                    padding: 20px;
                }

                .blog-list-title {
                    font-size: 21px;
                }

                .blog-pagination .page-link {
                    min-width: 38px;
                    height: 38px;
                    font-size: 13px;
                }
            }
        </style>

        @include('components.footer')

        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.easing.1.3.js"></script>
        <script src="assets/js/jquery.waypoints.min.js"></script>
        <script src="assets/js/jquery.stellar.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/js/aos.js"></script>
        <script src="assets/js/jquery.animateNumber.min.js"></script>
        <script src="assets/js/bootstrap-datepicker.js"></script>
        <script src="assets/js/jquery.timepicker.min.js"></script>
        <script src="assets/js/scrollax.min.js"></script>
        <!-- Google Maps removed - not needed for blog page -->
        <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
        <!-- <script src="assets/js/google-map.js"></script> -->
        <script src="assets/js/main.js"></script>

    </body>
</html>
