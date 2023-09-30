
function addRow() {
    event.preventDefault();
    var table = document.getElementById('subtoTable');
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var checkbox = document.createElement('input');
    checkbox.type = 'checkbox';
    checkbox.name = 'TenThongSo[]';

    var input = document.createElement('input');
    input.type = 'text';
    input.classList.add('ten-thong-so');
    input.placeholder = 'Nhập tên thông số';

    // Listen for changes in the checkbox
    checkbox.addEventListener('change', function() {
        // Set the value of the text input based on the checkbox state
        // input.value = this.checked ? 'Some Value when Checked' : 'Some Value when Unchecked';
        if (this.checked) {
            this.value =  input.value;
        }
    });

    cell1.appendChild(checkbox);
    cell2.appendChild(input);
    cell3.innerHTML = '<a class="btn btn-danger" onclick="return deleteRow(this)">Delete</a>';
}

function addData() {
    event.preventDefault();  // Prevents form submission

    var table = document.getElementById('subTable');
    table.innerHTML='';

    notSelectedThongSo.forEach(ts => {
        const row = document.createElement('tr');
        row.innerHTML = `
        <td><input type="checkbox"  name="TenThongSo[]" value="${ts.TenThongSo}"></td>
        <td><input type="text" class="ten-thong-so" value="${ts.TenThongSo}"></td>
        <td><a class="btn btn-danger" onclick="return deleteRow(this)">Xoá</a></td>
    `;
        table.appendChild(row);
    });
}
function deleteRow(button) {
    event.preventDefault();
    var row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
    return false;  // Prevents form submission
}
function showThongSo(event){
    var madanhmuc = this.value;
    let urlRequest = `getDanhMucSanPham`
    event.preventDefault();
    axios.get('/getDanhMucSanPham/' + madanhmuc)
        .then(function (response) {
            var productDetails = response.data;

            // Lấy phần tử HTML để hiển thị thông tin chi tiết sản phẩm
            var productSpecsDiv = document.querySelector('.product-specs');

            // Xóa nội dung hiện tại của phần tử
            productSpecsDiv.innerHTML = '';

            // Tạo bảng mới để hiển thị thông tin chi tiết kỹ thuật
            var specsTable = document.createElement('table');
            specsTable.id = 'specsTable';
            // Xử lý thông tin chi tiết sản phẩm và hiển thị lên giao diện người dùng
            productDetails.forEach(function (thongso){
                var row = document.createElement('tr');
                var cell1 = document.createElement('td');
                var cell2 = document.createElement('td');
                var cell3 = document.createElement('td');
                var input1 = document.createElement('input');
                input1.type = 'text';
                input1.name = 'TenThongSo[]';
                input1.value = thongso.TenThongSo;
                input1.className = 'ten-thong-so';

                var input2 = document.createElement('input');
                input2.type = 'text';
                input2.name = 'GiaTri[]';
                input2.placeholder='Nhập giá trị thông số';
                input2.className = 'ten-thong-so';
                var deleteButton = document.createElement('a');
                deleteButton.href = '#';
                deleteButton.className = 'btn btn-danger';
                deleteButton.innerText = 'Xoá';
                deleteButton.addEventListener('click', function() {
                    deleteRow(this);
                });
                var deleteButton = document.createElement('a');
                deleteButton.href = '#';
                deleteButton.className = 'btn btn-danger';
                deleteButton.innerText = 'Xoá';
                deleteButton.addEventListener('click', function() {
                    deleteRow(this);
                });

                cell1.appendChild(input1);
                cell2.appendChild(input2);
                cell3.appendChild(deleteButton);
                row.appendChild(cell1);
                row.appendChild(cell2);
                row.appendChild(cell3);

                specsTable.appendChild(row);
            });

            // Thêm bảng mới vào phần tử để hiển thị
            productSpecsDiv.appendChild(specsTable);
        })
        .catch(function (error) {
            console.error('Error:', error);
        });
}

function getMaDanhMuc() {
    // Lấy đối tượng select bằng query
    var selectBox = document.querySelector(".danh-muc-sua");

    // Lấy tùy chọn đã chọn
    var selectedOption = selectBox.options[selectBox.selectedIndex];

    // Lấy giá trị của tùy chọn đã chọn
    var selectedValue = selectedOption.value;

    // trả về giá trị của tùy chọn đã chọn
    return selectedValue;
}
function showThongSoSua(event){
    var madanhmuc = getMaDanhMuc();
    event.preventDefault();
    axios.get('/getDanhMucSanPham/' + madanhmuc)
        .then(function (response) {
            var productDetails = response.data;

            // Lấy phần tử HTML để hiển thị thông tin chi tiết sản phẩm
            var productSpecsDiv = document.querySelector('.product-sub');

            // Xóa nội dung hiện tại của phần tử
            productSpecsDiv.innerHTML = '';

            // Tạo bảng mới để hiển thị thông tin chi tiết kỹ thuật
            var specsTable = document.createElement('table');
            specsTable.id = 'subTable';
            // Xử lý thông tin chi tiết sản phẩm và hiển thị lên giao diện người dùng
            productDetails.forEach(function (thongso){
                var row = document.createElement('tr');
                var cell1 = document.createElement('td');
                var cell2 = document.createElement('td');
                var cell3 = document.createElement('td');

                var input1 = document.createElement('input');
                input1.type = 'text';
                input1.name = 'TenThongSo[]';
                input1.value = thongso.TenThongSo;
                input1.className = 'ten-thong-so';

                var input2 = document.createElement('input');
                input2.type = 'text';
                input2.name = 'GiaTri[]';
                input2.placeholder='Nhập giá trị thông số';
                input2.className = 'ten-thong-so';

                var deleteButton = document.createElement('a');
                deleteButton.href = '#';
                deleteButton.className = 'btn btn-danger';
                deleteButton.innerText = 'Xoá';
                deleteButton.addEventListener('click', function() {
                    deleteRow(this);
                });

                var deleteButton = document.createElement('a');
                deleteButton.href = '#';
                deleteButton.className = 'btn btn-danger';
                deleteButton.innerText = 'Xoá';
                deleteButton.addEventListener('click', function() {
                    deleteRow(this);
                });

                cell1.appendChild(input1);
                cell2.appendChild(input2);
                cell3.appendChild(deleteButton);
                row.appendChild(cell1);
                row.appendChild(cell2);
                row.appendChild(cell3);

                specsTable.appendChild(row);
            });

            // Thêm bảng mới vào phần tử để hiển thị
            productSpecsDiv.appendChild(specsTable);
        })
        .catch(function (error) {
            console.error('Error:', error);
        });
}

function addRowSP() {
    event.preventDefault();
    var table = document.getElementById('subTable');
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var checkbox = document.createElement('input');

    var input1 = document.createElement('input');
    input1.type = 'text';
    input1.name = 'TenThongSo[]';
    input1.classList.add('ten-thong-so');
    input1.placeholder = 'Nhập tên thông số';

    var input2 = document.createElement('input');
    input2.type = 'text';
    input2.name = 'GiaTri[]';
    input2.classList.add('ten-thong-so');
    input2.placeholder = 'Nhập giá trị thông số';

    cell1.appendChild(input1);
    cell2.appendChild(input2);
    cell3.innerHTML = '<a class="btn btn-danger" onclick="return deleteRow(this)">Xoá</a>';
}
// xoá sản phẩm thông số khi click
function xoaSPTS(){
    // let masanpham = $(this).data('masanpham');
    // let mathongso = $(this).data('mathongso');
    // axios.get('/xoasanphamthongso/' + masanpham +'/'+ mathongso)
    //     .then(function (response) {
    //         console.log(response.data)
    //     })
    //     .catch(function (error) {
    //         console.error('Error:', error);
    //     });

}
    $(function (){
        $(document).on('change', '.danh-muc',showThongSo)
        $(document).on('click', '.danh-muc-mau',showThongSoSua)
        $(document).on('click', '.xoa-sp-ts',xoaSPTS)
    })
