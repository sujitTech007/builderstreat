window.onload = function () {
	// Pie Chart (growthContainer)


	// Bar Chart (chartContainer)
   
        var chart = new CanvasJS.Chart("chartContainer",
        {
            
         
          data: [
    
          {
            dataPoints: [
				{ x: 1, y: 297571, label: "Jan", color: "#f5a623", }, // Golden Yellow
                { x: 2, y: 267017, label: "Feb", color: "#f76b1c" }, // Orange
                { x: 3, y: 175200, label: "Mar", color: "#d94a8c" }, // Magenta-Pink
                { x: 4, y: 154580, label: "Apr", color: "#8e44ad" }  // Purple
           
            ]
          }
          ]
        });
    
        chart.render();
      }

