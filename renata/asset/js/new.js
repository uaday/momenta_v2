const CHART = document.getElementById("myChart");
var myChart = new Chart(CHART,{
    type: 'pie',
    options:
    {
        tooltips:
        {
            enabled: false
        }
    },
    data: data = {
        labels: [ "PASS: "+a, "FAIL: "+b],
        datasets: 
        [{
            type:'pie',
            data: [a,b],
            backgroundColor: [
                "#5B5B95",
                "#E94699"
            ],

            hoverBackgroundColor: [
                "#5B5B95",
                "#E94699"
            ]
        }]
	}
});

const CHART2 = document.getElementById("myChart2");
var myChart2 = new Chart(CHART2,{
    type: 'pie',
    options:
    {
        tooltips:
        {
            enabled: false
        }
    },
    data: data = {
        labels: ["EXAM ATTEND: "+c, "NOT ATTEND: "+d],
        datasets: 
        [{
            type:'pie',
            data: [c, d],
            backgroundColor: [
                "#3580BE",
                "#00BADA" 
            ],

            hoverBackgroundColor: [
                "#3580BE",
                "#00BADA"
            ]
        }]
    }
});
