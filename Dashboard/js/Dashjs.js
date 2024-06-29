

function generateRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
  }
  
  function generateColors() {
    var colors = [];
    for (var i = 0; i < 30; i++) {
      colors.push(generateRandomColor());
    }
    return colors;
  }
  
  function loadCharts(chartData,chartType,chartLabels,chartHeader,canvasId,flagType){
    
    if(flagType === 'php'){
      chartLabels=JSON.parse(chartLabels);
    }

    
  
    var bgColor = '#1F1C36';
    var flagOptionLegendPosition = 'bottom';
    var flagOptionLegend = true;
    var flagOptionGridX = true;
    var flagOptionGridY = true;
    var flagOptionAxisX = true;
    var flagOptionAxisY = true;
    if(flagType === 'flagType' && chartType === 'bar'){
      bgColor = 'lightblue';

    }
    if(chartType === 'pie' || chartType === 'doughnut' ){
      flagOptionLegend = true;
      flagOptionGridX = false;
      flagOptionGridY = false;
      flagOptionAxisX = false;
      flagOptionAxisY = false;
      flagOptionLegendPosition = 'right';
      bgColor =  generateColors();
    }
    console.log(chartLabels);

    var data = {
      labels: chartLabels,
      datasets: [{
      label: chartHeader,
      data: chartData,
      backgroundColor:bgColor
      }]
    };
  
  
  
    var options = {
    plugins: {
      legend: {
        display: flagOptionLegend, // Set display to false to hide the legend
        position: flagOptionLegendPosition
      }
    },
    scales: {
  
      x: {
  display:flagOptionAxisX,
        grid: {
          display: flagOptionGridX
        }
      },
      y: {
  display:flagOptionAxisY,
        grid: {
          display: flagOptionGridY
        },
        beginAtZero: true
      }
    }
  };
  
  
  var ctx = document.getElementById(canvasId).getContext('2d');
  
  var createdChart = new Chart(ctx, {
      type: chartType,
      data: data,
      options: options
    });
  
  }
  










  
