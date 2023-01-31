<?php include('header.php'); ?>
<script>
	function chooseMeal() {
		// Get all recipe files
		const files = <?php echo json_encode(glob('recipes/*.html')); ?>;

		// Get the previously picked recipes from local storage
		let pickedRecipes = localStorage.getItem('pickedRecipes');
		if (pickedRecipes) {
			pickedRecipes = JSON.parse(pickedRecipes);
		} else {
			pickedRecipes = [];
		}

		// Filter out the previously picked recipes
		let availableRecipes = files.filter(
			recipe => !pickedRecipes.includes(recipe)
		);

		// If all recipes have been picked, reset the picked recipes
		if (availableRecipes.length === 0) {
			pickedRecipes = [];
			availableRecipes = files;
		}

		// Choose a random recipe
		const randomIndex = Math.floor(Math.random() * availableRecipes.length);
		const chosenRecipe = availableRecipes[randomIndex];

		// Add the chosen recipe to the picked recipes
		pickedRecipes.push(chosenRecipe);
		localStorage.setItem('pickedRecipes', JSON.stringify(pickedRecipes));

		const div = document.getElementById("recipe");

		fetch(chosenRecipe)
			.then(response => response.text())
			.then(text => {
				div.innerHTML = text;
			});
	}
</script>
<h1>What's for dinner?</h1>
<button onclick="chooseMeal()">Choose a Meal</button>

<div id="recipe"></div>
<?php include('footer.php'); ?>