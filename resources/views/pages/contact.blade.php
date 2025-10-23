<!DOCTYPE html>
<html lang="en">
	<head>
		@include('components.head')
	</head>
		<body class="contact-page" style="margin: 0; background-color: #ffffff; color: #1f1f1f; font-family: 'Poppins', Arial, sans-serif;">

		@include('components.header2')

		<!-- Contact Hero Section -->
		<section class="contact-hero" style="padding: 90px 0 70px 0;">
			<div class="container">
				<div class="contact-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 40px; align-items: stretch;">
					<div class="hero-visual" style="background: #fafafa; border-radius: 24px; display: flex; align-items: center; justify-content: center; padding: 20px; box-shadow: 0 24px 60px rgba(23, 23, 23, 0.08);">
						<img src="assets/images/chef-1.jpg" alt="Happy Chef" style="width: 100%; max-width: 320px; border-radius: 16px; object-fit: cover;">
					</div>
					<div class="hero-form" style="background: #ffffff; border-radius: 24px; padding: 40px; box-shadow: 0 24px 60px rgba(23, 23, 23, 0.08);">
						<h1 style="font-size: 38px; font-weight: 700; margin-bottom: 16px;">Contact us</h1>
						<p style="color: #6b6b6b; font-size: 16px; line-height: 1.6; margin-bottom: 32px;">
							Have a question, a recipe request, or want to collaborate? Fill out the form below and our team will get back to you quickly.
						</p>
						<form action="#" method="POST" class="contact-form" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 18px;">
							<div style="display: flex; flex-direction: column;">
								<label for="name" style="font-weight: 600; font-size: 14px; margin-bottom: 8px; color: #232323;">Name</label>
								<input id="name" type="text" class="form-control" placeholder="Enter your name" style="height: 52px; border-radius: 14px; border: 1px solid #e4e4e4; padding: 0 18px; background: #f9f9f9;">
							</div>
							<div style="display: flex; flex-direction: column;">
								<label for="email" style="font-weight: 600; font-size: 14px; margin-bottom: 8px; color: #232323;">Email address</label>
								<input id="email" type="email" class="form-control" placeholder="name@email.com" style="height: 52px; border-radius: 14px; border: 1px solid #e4e4e4; padding: 0 18px; background: #f9f9f9;">
							</div>
							<div style="display: flex; flex-direction: column;">
								<label for="inquiry" style="font-weight: 600; font-size: 14px; margin-bottom: 8px; color: #232323;">Inquiry type</label>
								<select id="inquiry" class="form-control" style="height: 52px; border-radius: 14px; border: 1px solid #e4e4e4; padding: 0 18px; background: #f9f9f9; color: #555;">
									<option>General question</option>
									<option>Recipe feedback</option>
									<option>Partnership</option>
									<option>Press inquiry</option>
								</select>
							</div>
							<div style="display: flex; flex-direction: column;">
								<label for="topic" style="font-weight: 600; font-size: 14px; margin-bottom: 8px; color: #232323;">Subject</label>
								<select id="topic" class="form-control" style="height: 52px; border-radius: 14px; border: 1px solid #e4e4e4; padding: 0 18px; background: #f9f9f9; color: #555;">
									<option>Let's talk</option>
									<option>Request a recipe</option>
									<option>Share an idea</option>
								</select>
							</div>
							<div style="grid-column: 1 / -1; display: flex; flex-direction: column;">
								<label for="message" style="font-weight: 600; font-size: 14px; margin-bottom: 8px; color: #232323;">Message</label>
								<textarea id="message" class="form-control" placeholder="Write your message" rows="5" style="border-radius: 18px; border: 1px solid #e4e4e4; padding: 18px; background: #f9f9f9;"></textarea>
							</div>
							<div style="grid-column: 1 / -1; display: flex; justify-content: center; margin-top: 10px;">
								<button type="submit" class="btn" style="background: #000000; color: #ffffff; padding: 14px 48px; border-radius: 30px; font-weight: 600; letter-spacing: 0.03em;">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>

		<!-- Newsletter Section -->
		<section class="newsletter-section" style="padding: 40px 0 90px 0;">
			<div class="container">
				<div class="newsletter-card" style="background: linear-gradient(135deg, #e4f6ff 0%, #eefaff 100%); border-radius: 28px; padding: 55px 40px; position: relative; overflow: hidden;">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<h2 style="font-size: 32px; font-weight: 700; margin-bottom: 12px;">Deliciousness to your inbox</h2>
							<p style="color: #5f5f5f; font-size: 16px; line-height: 1.7; margin-bottom: 25px;">
								Subscribe to get hand-picked seasonal recipes, cooking tips, and exclusive kitchen stories every week.
							</p>
						</div>
						<div class="col-lg-6">
							<form action="#" method="POST" class="newsletter-form" style="display: flex; gap: 12px; flex-wrap: wrap; justify-content: flex-end;">
								<input type="email" class="form-control" placeholder="Your email address" style="flex: 1 1 260px; height: 54px; border-radius: 30px; border: none; padding: 0 22px;">
								<button type="submit" class="btn" style="background: #000000; color: #ffffff; padding: 14px 32px; border-radius: 30px; font-weight: 600;">Subscribe</button>
							</form>
						</div>
					</div>
					<img src="assets/images/about.jpg" alt="Fresh vegetables" style="position: absolute; left: -40px; bottom: -20px; width: 200px; border-radius: 20px; box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);">
					<img src="assets/images/about-1.jpg" alt="Healthy dish" style="position: absolute; right: -40px; top: -20px; width: 210px; border-radius: 20px; box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);">
				</div>
			</div>
		</section>

		<!-- Featured Recipes -->
		<section class="featured-recipes" style="padding: 0 0 100px 0;">
			<div class="container">
				<div class="text-center" style="margin-bottom: 40px;">
					<h2 style="font-weight: 700; font-size: 32px; margin-bottom: 12px;">Check out the delicious recipe</h2>
					<p style="color: #6b6b6b; font-size: 16px;">Discover seasonal favorites curated by our chefs.</p>
				</div>
				<div class="recipe-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 30px;">
								@php
									$recipes = [
										['image' => 'breakfast-1.jpg', 'title' => 'Mixed Tropical Fruit Salad with Apple Sauce', 'category' => 'Healthy', 'time' => '30 mins', 'servings' => '2 servings', 'favorite' => true],
										['image' => 'breakfast-3.jpg', 'title' => 'Big and Juicy Wagyu Beef Cheeseburger', 'category' => 'Western', 'time' => '45 mins', 'servings' => '4 servings', 'favorite' => false],
										['image' => 'breakfast-5.jpg', 'title' => 'Healthy Japanese Fried Rice with Asparagus', 'category' => 'Vegetarian', 'time' => '35 mins', 'servings' => '3 servings', 'favorite' => true],
										['image' => 'breakfast-6.jpg', 'title' => 'Cauliflower Walnut Vegetarian Tacos', 'category' => 'Vegan', 'time' => '25 mins', 'servings' => '4 servings', 'favorite' => false],
									];
								@endphp

					@foreach ($recipes as $recipe)
						<div class="recipe-card" style="background: #ffffff; border-radius: 24px; box-shadow: 0 18px 40px rgba(17, 17, 17, 0.08); overflow: hidden; display: flex; flex-direction: column;">
											<div style="position: relative; overflow: hidden; border-radius: 22px 22px 0 0;">
												<img src="assets/images/{{ $recipe['image'] }}" alt="{{ $recipe['title'] }}" style="width: 100%; height: 190px; object-fit: cover;">
												<span class="favorite-icon" style="position: absolute; top: 16px; right: 16px; background: #ffffff; border-radius: 999px; width: 46px; height: 46px; display: grid; place-items: center; box-shadow: 0 12px 32px rgba(0,0,0,0.12);">
													<span class="icon-heart" style="font-size: 18px; color: {{ $recipe['favorite'] ? '#ff4d5a' : '#d8d8d8' }};"></span>
												</span>
							</div>
							<div style="padding: 24px; display: flex; flex-direction: column; gap: 14px;">
								<h3 style="font-size: 18px; font-weight: 600; line-height: 1.4; color: #232323;">{{ $recipe['title'] }}</h3>
								<div style="display: flex; align-items: center; gap: 12px; color: #898989; font-size: 14px;">
									<span style="display: flex; align-items: center; gap: 6px;"><span class="icon-tag"></span> {{ $recipe['category'] }}</span>
									<span style="width: 4px; height: 4px; border-radius: 50%; background: #cfcfcf;"></span>
									<span style="display: flex; align-items: center; gap: 6px;"><span class="icon-clock"></span> {{ $recipe['time'] }}</span>
									<span style="width: 4px; height: 4px; border-radius: 50%; background: #cfcfcf;"></span>
									<span style="display: flex; align-items: center; gap: 6px;"><span class="icon-user"></span> {{ $recipe['servings'] }}</span>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</section>

		<!-- Footer -->
			@include('components.footer')

			<style>
						.contact-page .header2-navbar {
							position: sticky;
							top: 0;
							z-index: 1020;
						}

						@media (max-width: 991.98px) {
							.contact-page .contact-hero {
								margin-top: 120px;
							}
						}

				.contact-page .contact-hero {
					padding: 90px 0 70px 0;
					margin-top: 110px;
				}

				.recipe-card:hover {
					transform: translateY(-6px);
					transition: transform 0.2s ease;
				}

						@media (max-width: 991.98px) {
					.contact-page .contact-hero {
						margin-top: 90px;
					}

					.hero-visual {
						order: -1;
					}

					.hero-form {
						padding: 32px;
					}

					.newsletter-card {
						padding: 40px 24px;
					}

					.newsletter-card img {
						display: none;
					}

					.recipe-grid {
						grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
					}
				}

				@media (max-width: 576px) {
					.hero-form {
						padding: 28px;
					}

					.hero-form h1 {
						font-size: 30px !important;
					}

					.contact-form {
						grid-template-columns: 1fr !important;
					}

					.newsletter-form {
						justify-content: center !important;
					}

					.newsletter-form button {
						width: 100%;
					}
				}
			</style>

		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</body>
</html>
