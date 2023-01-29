	<h1>Meal Chooser</h1>
	<button onclick="chooseMeal('quick')">Quick / low effort</button>
	<button onclick="chooseMeal('tasty')">Tasty/ Comforting</button>
	<button onclick="chooseMeal('gourmet')">Gourmet & healthy</button>
	<div id="recipe"></div>

	<script>
		const quickRecipes = ['recipes/broccoli-soup.html', 'recipes/nachos.html', 'recipes/roasted-salmon.html', 'recipes/sausage-soup.html'];
		const tastyRecipes = ['recipes/steak-bowl.html', 'recipes/cheese-and-crackers.html', 'recipes/tacos.html'];
		const gourmetRecipes = ['recipes/pork-tenderloin-with-sweet-potatoes.html', 'recipes/smoked-salmon-salad.html', 'recipes/zoodle-scampi.html', 'recipes/steak-with-salad.html', 'recipes/meatballs-zoodles.html'];

		function chooseMeal(mealType) {
			let recipes;
			if (mealType === 'quick') {
				recipes = quickRecipes;
			} else if (mealType === 'tasty') {
				recipes = tastyRecipes;
			} else if (mealType === 'gourmet') {
				recipes = gourmetRecipes;
			}

			const randomIndex = Math.floor(Math.random() * recipes.length);
			const recipe = recipes[randomIndex];

			fetch(recipe)
				.then(response => response.text())
				.then(data => {
					const recipeContainer = document.getElementById('recipe');
					recipeContainer.innerHTML = data;
				});
		}
	</script>