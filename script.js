document.addEventListener("DOMContentLoaded", () => {
	const cards = document.querySelectorAll(".service-card");
	const dots = document.querySelectorAll(".dot");
	const cardsPerPage = 3; // Number of services per page
	let currentPage = 0;

	// Function to display a specific page
	function showPage(page) {
		cards.forEach((card, index) => {
			card.style.display =
				index >= page * cardsPerPage && index < (page + 1) * cardsPerPage
					? "block"
					: "none";
		});

		dots.forEach((dot, index) => {
			dot.classList.toggle("active", index === page);
		});
	}

	// Add click event listeners to dots
	dots.forEach((dot, index) => {
		dot.addEventListener("click", () => {
			currentPage = index;
			showPage(currentPage);
		});
	});

	// Show the first page initially
	showPage(currentPage);
});
