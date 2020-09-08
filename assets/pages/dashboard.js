drawChartOmset();

function getSortOrder(prop) {
	return function (a, b) {
		if (a[prop] > b[prop]) {
			return 1;
		} else if (a[prop] < b[prop]) {
			return -1;
		}
		return 0;
	};
}

function formatCurrency(total) {
	var neg = false;
	if (total < 0) {
		neg = true;
		total = Math.abs(total);
	}
	return (
		(neg ? "-Rp. " : "Rp. ") +
		parseFloat(total, 10)
			.toFixed(2)
			.replace(/(\d)(?=(\d{3})+\.)/g, "$1,")
			.toString()
	);
}

async function drawChartOmset() {
	const dataset = await getOmsetData(
		"http://localhost/mbaroh/dashboard/get_omset"
	);

	var ctx = document.getElementById("chartOmset").getContext("2d");
	var chartOmset = new Chart(ctx, {
		type: "line",
		data: {
			labels: dataset.horizontalLabel,
			datasets: [
				{
					label: "Total Omset per Bulan",
					data: dataset.verticalLabel,
					borderWidth: 1,
				},
			],
		},
		options: {
			scales: {
				yAxes: [
					{
						ticks: {
							beginAtZero: true,
							callback: function (value) {
								return formatCurrency(value);
							},
						},
					},
				],
			},
			tooltips: {
				callbacks: {
					label: function (tooltipItem) {
						return formatCurrency(tooltipItem.value);
					},
				},
			},
		},
	});
}

async function getOmsetData(url) {
	const verticalLabel = [];
	const horizontalLabel = [];
	const indexOfMonth = [];

	let response = await fetch(url);
	let result = await response.json();

	for (let index in result.data) {
		verticalLabel.push(result.data[index].omset);
		horizontalLabel.push(result.data[index].month_name);
		indexOfMonth.push(result.data[index].indexOfMonth);
	}

	return { verticalLabel, horizontalLabel, indexOfMonth };
}
