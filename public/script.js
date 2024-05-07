function changeContentWidth(isHovered) {
	var content = document.querySelector('.content');
	if (isHovered) {
	  content.classList.add('expanded');
	} else {
	  content.classList.remove('expanded');
	}
  }

  function createBarChart(labels, data, chartId, chartTitle) {
    var ctx = document.getElementById(chartId).getContext('2d');

    // Khởi tạo biểu đồ cột
    var myChart = new Chart(ctx, {
        type: 'bar', // Loại biểu đồ: cột
        data: {
            labels: labels, // Nhãn của các cột
            datasets: [{
                label: chartTitle, // Nhãn của dữ liệu
                data: data, // Dữ liệu tương ứng với các cột
                backgroundColor: 'rgba(255, 99, 132, 0.2)', // Màu nền của cột
                borderColor: 'rgba(255, 99, 132, 1)', // Màu viền của cột
                borderWidth: 1 // Độ rộng của đường viền của cột
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true // Bắt đầu trục y từ 0
                    }
                }]
            }
        }
    });
}

var labels = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
var data = [300, 100, 75, 155, 234, 100, 100, 100, 100, 100, 100, 100];
var chartId = 'myChart';
var chartTitle = 'Doanh thu';

createBarChart(labels, data, chartId, chartTitle);


// Đối tượng canvas để vẽ biểu đồ
var ctx1 = document.getElementById('myDonutChart').getContext('2d');

// Dữ liệu biểu đồ
var data = {
    labels: ['Red', 'Blue', 'Yellow'],
    datasets: [{
        data: [300, 50, 100], // Dữ liệu
        backgroundColor: [
            'red',
            'blue',
            'yellow'
        ]
    }]
};

// Cấu hình biểu đồ
var options = {
	responsive: true, // Tự động điều chỉnh kích thước theo kích thước của phần tử chứa (mặc định là true)
    maintainAspectRatio: false,
    cutoutPercentage: 10, // Phần trống giữa các vòng
    rotation: Math.PI, // Góc quay (1/2 vòng tròn để bắt đầu ở trên)
    // circumference: Math.PI // Chiều dài vòng tròn
};

// Tạo biểu đồ hình donut
var myDonutChart = new Chart(ctx1, {
    type: 'doughnut',
    data: data,
    options: options
});
