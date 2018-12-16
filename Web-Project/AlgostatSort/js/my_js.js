var myChart;

//Compte le nombre de test que l'on a lancé avec le button go
var staticNbExecution = (function() {
  var staticNbExecution = 0;

  return function() {
    staticNbExecution++;
    return staticNbExecution;
  };
})();
//Idem mais sera afficher pour les points sur le graph
var staticI = (function() {
  var i = 0;

  return function() {
    i++;
    return i;
  };
})();
/*charger la data en ajax*/
function loadData(dataType=[  null ],nbItem=null,nbExec){ 
  var tab =[];
  $.post({
    url : 'controller/loadDataController.php?dataType='+dataType+'&nbItem='+nbItem+'&nbExec='+nbExec,  
    dataType: "text",
    async: false,
    data: {dataType:dataType},
    success : function(data, statut){
      tab=JSON.parse(data);

    },
    error : function(result, statut, error){
      console.log(error);
    }
  });
  return tab;
};

//permet de recuperer aleatoirement une couleur dans le fichier colorData.js tout en la supprimant
function getColor(){
  var colorSelect =Math.floor((Math.random() * 865) + 1);
  var colorSelected = color[colorSelect];
  color.splice(colorSelect, 1);
  return colorSelected;
};

//charger chart js la premiere fois
function loadChart(data=[  null ], getColor  ,testType){ 
  var bubbleSort=[];
  var selectSort=[];
  var insertSort=[];
  var shellSort=[];
  var wFuseSort=[];
  var wQuickSort=[];
  var wRandQuickSort=[];
  var combSort=[];
  var turn = staticI();
  if (testType == "tour") {
    for (var i = 0;i<=data[0].length - 1;   i++) {

      bubbleSort[i]=data[8][i];
      insertSort[i]=data[9][i];
      selectSort[i]=data[10][i];
      shellSort[i]=data[11][i];
      wFuseSort[i]=data[12][i];
      wQuickSort[i]=data[13][i];
      wRandQuickSort[i]=data[14][i];
      combSort[i]=data[15][i];
    }
  }
  if (testType == "chrono" ) {
    for (var i = 0;i<=data[0].length - 1;   i++) {

      bubbleSort[i]=data[0][i];
      insertSort[i]=data[1][i];
      selectSort[i]=data[2][i];
      shellSort[i]=data[3][i];
      wFuseSort[i]=data[4][i];
      wQuickSort[i]=data[5][i];
      wRandQuickSort[i]=data[6][i];
      combSort[i]=data[7][i];

    }  
  }
  bubbleSort=JSON.stringify(bubbleSort);
  insertSort=JSON.stringify(insertSort);
  selectSort=JSON.stringify(selectSort);
  shellSort=JSON.stringify(shellSort);
  wFuseSort=JSON.stringify(wFuseSort);
  wQuickSort=JSON.stringify(wQuickSort);
  wRandQuickSort=JSON.stringify(wRandQuickSort);
  combSort=JSON.stringify(combSort);
  var nbLabel=$('#nbExec').val();
  var labels=[];
  for (var i = 0; i <= nbLabel - 1; i++) {
    labels[i]=i;
  }  
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: 'BubbleSort'+turn,
        data: eval(bubbleSort),
        borderColor: getColor,
        fill: false
      }, {
        label: 'selectSort'+turn,
        data: eval(selectSort),
        borderColor: getColor,
        fill: false
      },{
        label: 'insertSort'+turn,
        data: eval(insertSort),
        borderColor: getColor,
        fill: false
      },{
        label: 'shellSort'+turn,
        data: eval(shellSort),
        borderColor: getColor,
        fill: false
      },{
        label: 'wFuseSort'+turn,
        data: eval(wFuseSort),
        borderColor: getColor,
        fill: false
      },{
        label: 'wQuickSort'+turn,
        data: eval(wQuickSort),
        borderColor: getColor,
        fill: false
      },{
        label: 'wRandQuickSort'+turn,
        data: eval(wRandQuickSort),
        borderColor: getColor,
        fill: false
      },{
        label: 'combSort'+turn,
        data: eval(combSort),
        borderColor: getColor,
        fill: false
      }]},
      options: {
        responsive: true,
        legend: {
          position: 'top',
        },
        hover: {
          mode: 'label'
        },
        scales: {
          xAxes: [{
            display: true,
            ticks: {
              beginAtZero: true
            },
            scaleLabel: {
              display: true,
              labelString: "Nombre d'execuion"
            }
          }],
          yAxes: [{
            display: true,
            ticks: {
              beginAtZero: true
            },
            scaleLabel: {
              display: true,
              labelString: $('#testType').val()
            }
          }]
        },
        title: {
          display: true,
          text: 'Result'
        },
        pan: {
          enabled: true,
          mode: 'y'
        },
        zoom: {
          enabled: true,
          mode: 'y',
          limits: {
            max: 10,
            min: 0.5
          }
        },
      },


    });
  return myChart;
};

//jquery ui
$( "body" ).tooltip();

//navigation1
$("#algo").click(function(e) {
  e.preventDefault();
  $("#resultContent").hide();
  $("#algoContent").show('clip', { direction: 'vertical' }, 1000);
});

//navigation2
$("#result").click(function(e) {
  e.preventDefault();
  $("#algoContent").hide();
  $("#resultContent").show('clip', { direction: 'vertical' }, 1000);
});


$(document).ready(function() {
  $("#resultContent").hide();
});

//charge une nouveau jeu de data
function addNewTest(data,getColor,testType){
  var turn = staticI();
  var bubbleSort=[];
  var selectSort=[];
  var insertSort=[];
  var shellSort=[];
  var wFuseSort=[];
  var wQuickSort=[];
  var wRandQuickSort=[];
  var combSort=[];
  if (testType == "tour") {
    for (var i = 0;i<=data[0].length - 1;   i++) {

      bubbleSort[i]=data[8][i];
      insertSort[i]=data[9][i];
      selectSort[i]=data[10][i];
      shellSort[i]=data[11][i];
      wFuseSort[i]=data[12][i];
      wQuickSort[i]=data[13][i];
      wRandQuickSort[i]=data[14][i];
      combSort[i]=data[15][i];
    }
  }
  if (testType == "chrono" ) {
    for (var i = 0;i<=data[0].length - 1;   i++) {

      bubbleSort[i]=data[0][i];
      insertSort[i]=data[1][i];
      selectSort[i]=data[2][i];
      shellSort[i]=data[3][i];
      wFuseSort[i]=data[4][i];
      wQuickSort[i]=data[5][i];
      wRandQuickSort[i]=data[6][i];
      combSort[i]=data[7][i];
    }  
  }
  bubbleSort=JSON.stringify(bubbleSort);
  insertSort=JSON.stringify(insertSort);
  selectSort=JSON.stringify(selectSort);
  shellSort=JSON.stringify(shellSort);
  wFuseSort=JSON.stringify(wFuseSort);
  wQuickSort=JSON.stringify(wQuickSort);
  wRandQuickSort=JSON.stringify(wRandQuickSort);
  combSort=JSON.stringify(combSort);
  var newDatasetBubble = {
    label: 'bubbleSort '+turn,
    borderColor: getColor,
    data: eval(bubbleSort),
    fill: false,
  }
  var newDatasetSelect = {
    label: 'selectSort '+turn,
    borderColor: getColor,
    data: eval(selectSort),
    fill: false,
  }
  var newDatasetInsert = {
    label: 'insertSort ' + turn,
    borderColor: getColor,
    data: eval(insertSort),
    fill: false,
  }
  var newDatasetshellSort = {
    label: 'shellSort ' + turn,
    borderColor: getColor,
    data: eval(shellSort),
    fill: false,
  }
  var newDatasetwFuseSort = {
    label: 'wFuseSort ' + turn,
    borderColor: getColor,
    data: eval(wFuseSort),
    fill: false,
  }
  var newDatasetwQuickSort = {
    label: 'wQuickSort ' + turn,
    borderColor: getColor,
    data: eval(wQuickSort),
    fill: false,
  }
  var newDatasetwRandQuickSort = {
    label: 'wRandQuickSort ' + turn,
    borderColor: getColor,
    data: eval(wRandQuickSort),
    fill: false,
  }
  var newDatasetcombSort = {
    label: 'combSort ' + turn,
    borderColor: getColor,
    data: eval(combSort),
    fill: false,
  }
  myChart.data.datasets.push(newDatasetBubble);
  myChart.data.datasets.push(newDatasetSelect);
  myChart.data.datasets.push(newDatasetInsert);
  myChart.data.datasets.push(newDatasetshellSort);
  myChart.data.datasets.push(newDatasetwFuseSort);
  myChart.data.datasets.push(newDatasetwQuickSort);
  myChart.data.datasets.push(newDatasetwRandQuickSort);
  myChart.data.datasets.push(newDatasetcombSort);
  myChart.update();

}
//contruit le tableau de log dans la section 2
function addStatInTable(data,testType){
  var bubbleSort=[];
  var selectSort=[];
  var insertSort=[];
  var shellSort=[];
  var wFuseSort=[];
  var wQuickSort=[];
  var wRandQuickSort=[];
  var combSort=[];

  var sortMoy=[];
  var selectSortMoy=[];
  var insertSortMoy=[];

  if (testType == "tour") {
    for (var i = 0;i<=data[0].length - 1;   i++) {

      bubbleSort[i]=data[8][i];
      insertSort[i]=data[9][i];
      selectSort[i]=data[10][i];
      shellSort[i]=data[11][i];
      wFuseSort[i]=data[12][i];
      wQuickSort[i]=data[13][i];
      wRandQuickSort[i]=data[14][i];
      combSort[i]=data[15][i];
    }
  }
  if (testType == "chrono" ) {
    for (var i = 0;i<=data[0].length - 1;   i++) {

      bubbleSort[i]=data[0][i];
      insertSort[i]=data[1][i];
      selectSort[i]=data[2][i];
      shellSort[i]=data[3][i];
      wFuseSort[i]=data[4][i];
      wQuickSort[i]=data[5][i];
      wRandQuickSort[i]=data[6][i];
      combSort[i]=data[7][i];
    }  
  }
  var temp = staticNbExecution();
  $('.tbodyD').append("<tr><td>"+
    temp+
    "</td><td>"+
    $('#typeList option:selected').text()+
    "</td><td>"+$('#testType').val()+
    "=>selectSort : "+
    selectSort+
    "<br>bubbleSort : "+
    bubbleSort+
    "<br>insertSort : "+
    insertSort+
    "<br>shellSort : "+
    shellSort+
    "<br>wFuseSort : "+
    wFuseSort+
    "<br>wQuickSort : "+
    wQuickSort+
    "<br>wRandQuickSort : "+
    wRandQuickSort+
    "<br>combSort : "+
    combSort+"</td></tr>");
  $('.tdM').append("<br>------------test : "+temp);

  for (var i = 0;i<=data[0].length - 1;   i++) {

    sortMoy[i]=parseFloat(data[0][i]) +parseFloat( data[1][i])+parseFloat(data[2][i]);
    $('.tdM').append("<br>moyenne execution "+i+" : "+sortMoy[i]);

  }
}

//declanche le test une premiere fois
$('body').on("click", ".action", function(e) { 
  e.preventDefault();
  var data = loadData($('#typeList').val(),$('#nbItem').val(),$('#nbExec').val()); 
  myChart=loadChart(data,getColor(),$('#testType').val());  
  addStatInTable(data,$('#testType').val());
  $('.buttonReplace').html('<button   class="btn btn-secondary  actionNext" type="button">go!</button>');
});

//les fois suivante
$('body').on("click", ".actionNext", function(e) { 
  var data = loadData($('#typeList').val(),$('#nbItem').val(),$('#nbExec').val()); 

  addNewTest(data,getColor(),$('#testType').val());
  addStatInTable(data,$('#testType').val());

});
//supprime et reinitialise le graph
$('body').on("click", ".actionDestroy", function(e) { 

  myChart.destroy();
  $('.buttonReplace').html('<button   class="btn btn-secondary  action" type="button">go!</button>');

});
