<style>
    .category-dashboard {
        padding: 20px;
        background-color: #f8f9fa;
    }

    .category-header {
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        color: white;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .category-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        transition: transform 0.2s ease;
        border: none;
        margin-bottom: 20px;
    }

    .category-card:hover {
        transform: translateY(-5px);
    }

    .category-table {
        margin: 0;
    }

    .category-table th {
        background: #f8f9fa;
        color: #495057;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 12px;
        padding: 15px;
        border-bottom: 2px solid #dee2e6;
    }

    .category-table td {
        padding: 15px;
        vertical-align: middle;
    }

    .category-actions {
        display: flex;
        gap: 8px;
        justify-content: flex-end;
    }

    .btn-category {
        padding: 8px 16px;
        border-radius: 6px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-add-category {
        background: linear-gradient(135deg, #0396FF 0%, #ABDCFF 100%);
        color: white;
        border: none;
        padding: 10px 20px;
        font-weight: 600;
    }

    .btn-add-category:hover {
        background: linear-gradient(135deg, #0384E3 0%, #97C8F9 100%);
        transform: translateY(-2px);
    }

    .btn-edit {
        background-color: rgba(52, 195, 143, 0.1);
        color: #34c38f;
        border: none;
    }

    .btn-edit:hover {
        background-color: #34c38f;
        color: white;
    }

    .btn-delete {
        background-color: rgba(244, 106, 106, 0.1);
        color: #f46a6a;
        border: none;
    }

    .btn-delete:hover {
        background-color: #f46a6a;
        color: white;
    }

    .status-badge {
        padding: 6px 12px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 500;
    }

    .status-active {
        background-color: rgba(52, 195, 143, 0.1);
        color: #34c38f;
    }

    .status-inactive {
        background-color: rgba(244, 106, 106, 0.1);
        color: #f46a6a;
    }

    .category-search {
        position: relative;
        max-width: 300px;
    }

    .category-search input {
        padding: 10px 15px;
        border-radius: 6px;
        border: 1px solid #e2e8f0;
        width: 100%;
        transition: all 0.3s ease;
    }

    .category-search input:focus {
        border-color: #0396FF;
        box-shadow: 0 0 0 2px rgba(3, 150, 255, 0.1);
        outline: none;
    }

    .category-filters {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
        align-items: center;
    }

    .category-count {
        font-size: 14px;
        color: #6c757d;
    }

    .empty-state {
        text-align: center;
        padding: 40px 20px;
        color: #6c757d;
    }

    .empty-state i {
        font-size: 48px;
        margin-bottom: 10px;
        color: #dee2e6;
    }
</style>

<div class="category-dashboard">
    <div class="category-header">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">Quản lý danh mục</h1>
            <button class="btn btn-add-category">
                <i class="ri-add-line me-1"></i> Thêm danh mục mới
            </button>
        </div>
    </div>

    <div class="category-card">
        <div class="card-body">
            <div class="category-filters">
                <div class="category-search">
                    <input type="text" placeholder="Tìm kiếm danh mục..." id="searchCategory">
                </div>
                <div class="category-count">
                    Hiển thị <span class="fw-semibold"><?= count($listdanhmuc) ?></span> danh mục
                </div>
            </div>

            <div class="table-responsive">
                <table class="table category-table">
                    <thead>
                        <tr>
                            <th style="width: 50px;">STT</th>
                            <th>Tên danh mục</th>
                            <th>Trạng thái</th>
                            <th style="width: 150px;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($listdanhmuc)): ?>
                            <?php foreach ($listdanhmuc as $index => $danhmuc): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="fw-medium"><?= htmlspecialchars($danhmuc['ten_danh_muc']) ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="status-badge <?= $danhmuc['trang_thai'] ? 'status-active' : 'status-inactive' ?>">
                                            <?= $danhmuc['trang_thai'] ? 'Hoạt động' : 'Không hoạt động' ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="category-actions">
                                            <button class="btn btn-category btn-edit" onclick="editCategory(<?= $danhmuc['id'] ?>)">
                                                <i class="ri-edit-line"></i>
                                            </button>
                                            <button class="btn btn-category btn-delete" onclick="deleteCategory(<?= $danhmuc['id'] ?>)">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">
                                    <div class="empty-state">
                                        <i class="ri-folder-unknow-line"></i>
                                        <p>Chưa có danh mục nào</p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchCategory');
    const tableRows = document.querySelectorAll('.category-table tbody tr');

    searchInput.addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();

        tableRows.forEach(row => {
            const categoryName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            if (categoryName.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});

function editCategory(id) {
    // Implement edit functionality
    window.location.href = `?act=sua-danh-muc&id=${id}`;
}

function deleteCategory(id) {
    if (confirm('Bạn có chắc chắn muốn xóa danh mục này?')) {
        window.location.href = `?act=xoa-danh-muc&id=${id}`;
    }
}
</script> 