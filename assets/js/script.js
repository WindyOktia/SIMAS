var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
	type: 'pie',
	data: {
		labels: ['Hadir', 'Tidak Hadir'],
		datasets: [{
			label: '# of Votes',
			data: [29, 19],
			backgroundColor: [
				'#5ABCB9', '#FA824C'
			],
			borderWidth: 2
		}]
	}
});

var cfx = document.getElementById('myChart2').getContext('2d');
var myChart2 = new Chart(cfx, {
	type: 'pie',
	data: {
		labels: ['Hadir', 'Tidak Hadir'],
		datasets: [{
			label: '# of Votes',
			data: [12, 19],
			backgroundColor: [
				'rgba(255, 99, 132, 0.2)',
				'rgba(54, 162, 235, 0.2)'
			],
			borderWidth: 2
		}]
	}
});
