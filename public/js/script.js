document.addEventListener("DOMContentLoaded", function () {
    // Xử lý tab
    const tabItems = document.querySelectorAll('.tab-item');
    tabItems.forEach(item => {
        item.addEventListener('click', function () {
            tabItems.forEach(tab => tab.classList.remove('active'));
            this.classList.add('active');
        });
    });


    // Lấy các phần tử slide và nút di chuyển
    const slides = document.querySelectorAll('.slide');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    let currentSlide = 0;

    // Hàm hiển thị slide
    function showSlide(index) {
        const slideWidth = slides[0].clientWidth;
        const slidesContainer = document.querySelector('.slides');
        slidesContainer.style.transform = `translateX(-${index * slideWidth}px)`;
        currentSlide = index;
    }

    // Hàm chuyển sang slide tiếp theo
    function showNextSlide() {
        const totalSlides = slides.length;
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
    }

    // Hàm chuyển về slide trước
    function showPreviousSlide() {
        const totalSlides = slides.length;
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        showSlide(currentSlide);
    }

    // Sự kiện click cho nút prev và next
    prevButton.addEventListener('click', showPreviousSlide);
    nextButton.addEventListener('click', showNextSlide);

    // Tự động chuyển slide sau mỗi 5 giây
    setInterval(showNextSlide, 5000);

    // Xử lý dropdown
    function toggleDropdown() {
        var dropdownContent = document.getElementById("dropdownContent");
        dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
    }

    document.querySelectorAll('.dropdown-content a').forEach(function (option) {
        option.addEventListener('click', function () {
            var selectedOption = document.getElementById("selectedOption");
            selectedOption.value = option.getAttribute("data-option");
            document.getElementById("selectedForm").submit();
        });
    });

    // Lấy tất cả các phần tử có class 'loai-item'
    const loaiItems = document.querySelectorAll('.loai-item');

    // Lặp qua mỗi phần tử và thêm sự kiện click
    loaiItems.forEach(function (item) {
        item.addEventListener('click', function () {
            // Lấy dung lượng tương ứng với phần tử được chọn
            const selectedDungLuong = this.innerText;

            // Lặp qua tất cả các phần tử .iphone-item-storage
            const iphoneItemStorages = document.querySelectorAll('.iphone-item-storage');
            iphoneItemStorages.forEach(function (storage) {
                // Kiểm tra xem dung lượng của iphone-item có trùng khớp với dung lượng được chọn không
                if (storage.querySelector('.dungluong').innerText.includes(selectedDungLuong)) {
                    // Hiển thị iphone-item nếu dung lượng khớp
                    storage.style.display = 'block';
                } else {
                    // Ẩn iphone-item nếu dung lượng không khớp
                    storage.style.display = 'none';
                }
            });
        });
    });
});