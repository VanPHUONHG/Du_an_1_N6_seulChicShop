<?php

class AdminContactController
{
    public $ModelAdminContact;
    public function __construct()
    {
        $this->ModelAdminContact = new AdminContact();
    }
    public function listContact()
    {
        $listContact = $this->ModelAdminContact->getAllContact();
        require_once './views/contact/ListContact.php';
    }
    public function detailContact($id)
    {
        $contact = $this->ModelAdminContact->getContactById($id);
        return $contact;
    }
    public function formEditContact()
    {
        $id = $_GET['id'] ?? '';
        if (empty($id)) {
            header('Location: ' . BASE_URL_ADMIN . '?act=lien-he');
            exit();
        }

        $contact = $this->ModelAdminContact->getContactById($id);
        if (!$contact) {
            header('Location: ' . BASE_URL_ADMIN . '?act=lien-he');
            exit();
        }

        require_once './views/contact/EditContact.php';
    }
    public function editStatusContact()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contactId = $_POST['contact_id'] ?? '';
            $status = $_POST['trang_thai'] ?? '';

            if (empty($contactId) || !isset($status)) {
                $_SESSION['error'] = 'Thông tin không hợp lệ';
                header('Location: ' . BASE_URL_ADMIN . '?act=lien-he');
                exit();
            }

            // Get current contact status
            $currentContact = $this->ModelAdminContact->getContactById($contactId);

            // If current status is 1 (đã xử lý), don't allow changing to 0 (chưa xử lý)
            if ($currentContact['trang_thai'] == 1) {
                $_SESSION['error'] = 'Không thể thay đổi trạng thái từ đã xử lý sang chưa xử lý';
                header('Location: ' . BASE_URL_ADMIN . '?act=form-chinh-sua-lien-he&id=' . $contactId);
                exit();
            }

            if ($this->ModelAdminContact->updateContactStatus($contactId, $status)) {
                $_SESSION['success'] = 'Cập nhật trạng thái thành công';
            } else {
                $_SESSION['error'] = 'Cập nhật trạng thái thất bại';
            }

            header('Location: ' . BASE_URL_ADMIN . '?act=lien-he');
            exit();
        }

        header('Location: ' . BASE_URL_ADMIN . '?act=lien-he');
        exit();
    }
    public function destroyContact()
    {
        $id = $_GET['id'];
        $contact = $this->ModelAdminContact->deleteContact($id);
        if($contact){
            header('Location: ' . BASE_URL_ADMIN . '?act=lien-he');
            exit();
        }
    }
}
