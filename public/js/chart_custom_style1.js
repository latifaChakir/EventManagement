$(document).ready(function() {
    var userData = parseInt(document.getElementById('users-data').getAttribute('data-users'));
    // console.log(document.getElementById('users-data').getAttribute('data-users'));
    var orgnizersData = parseInt(document.getElementById('orgnizers-data').getAttribute('data-orgnizers'));
    var acceptedData = parseInt(document.getElementById('acceptedEvents-data').getAttribute('data-acceptedEvents'));
    var refusedData = parseInt(document.getElementById('refusedEvents-data').getAttribute('data-refusedEvents'));


    var $lineChart = $('#line-chart');

    var lineChart = new Chart($lineChart.find('canvas'), {
        type: 'line',
        data: {
            labels: ['users', 'Organizers', 'Accepted Events', 'Rejected Events'],
            datasets: [{
                data: [userData, orgnizersData, acceptedData, refusedData],
                backgroundColor: 'transparent',
                borderColor: '#d34836',
                pointBorderColor: '#d34836',
                pointBackgroundColor: '#d34836',
                fill: false
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
});
