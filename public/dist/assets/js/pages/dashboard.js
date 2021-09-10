var optionsProfileVisit = {
    annotations: {
        position: 'back'
    },
    dataLabels: {
        enabled: false
    },
    chart: {
        type: 'bar',
        height: 300
    },
    fill: {
        opacity: 1
    },
    plotOptions: {
    },
    series: [{
        name: 'peminjaman',
        data: [9, 20, 30, 20, 10, 20, 30, 20, 10, 20, 30, 20]
    }],
    colors: '#ff7976',
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    },
}


var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);

chartProfileVisit.render();
