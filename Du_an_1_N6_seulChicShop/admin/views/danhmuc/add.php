<style>
    .category-form-container {
        padding: 20px;
        background-color: #f8f9fa;
    }

    .category-form-header {
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        color: white;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .category-form-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        border: none;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
        color: #495057;
    }

    .form-control {
        padding: 0.75rem 1rem;
        border-radius: 6px;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #0396FF;
        box-shadow: 0 0 0 2px rgba(3, 150, 255, 0.1);
    }

    .form-switch {
        padding-left: 2.5rem;
    }

    .btn-submit {
        background: linear-gradient(135deg, #0396FF 0%, #ABDCFF 100%);
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 6px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #0384E3 0%, #97C8F9 100%);
        transform: translateY(-2px);
    }

    .btn-cancel {
        background: #e2e8f0;
        color: #495057;
        border: none;
        padding: 12px 24px;
        border-radius: 6px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-cancel:hover {
        background: #cbd5e1;
    }

    .form-actions {
        display: flex;
        gap: 10px;
        justify-content: flex-end;
        margin-top: 2rem;
    }
</style>

<div class="category-form-container">
    <div class="category-form-header">
        <h1 class="h3 mb-0"><?= isset($danhmuc) ? 'Sửa danh mục' : 'Thêm danh mục mới' ?></h1>
    </div>

    <div class="category-form-card">
        <div class="card-body">
            <form action="<?= BASE_URL ?>admin/?act=<?= isset($danhmuc) ? 'sua-danh-muc' : 'them-danh-muc' ?>" method="POST">
                <?php if (isset($danhmuc)): ?>
                    <input type="hidden" name="id" value="<?= $danhmuc['id'] ?>">
                <?php endif; ?>

                <div class="form-group">
                    <label class="form-label">Tên danh mục</label>
                    <input type="text" class="form-control" name="ten_danh_muc" 
                           value="<?= isset($danhmuc) ? htmlspecialchars($danhmuc['ten_danh_muc']) : '' ?>" 
                           required>
                </div>

                <div class="form-group">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="trang_thai" 
                               <?= (isset($danhmuc) && $danhmuc['trang_thai']) ? 'checked' : '' ?>>
                        <label class="form-check-label">Hoạt động</label>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="<?= BASE_URL ?>admin/?act=danh-muc" class="btn btn-cancel">Hủy</a>
                    <button type="submit" class="btn btn-submit">
                        <?= isset($danhmuc) ? 'Cập nhật' : 'Thêm mới' ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> 