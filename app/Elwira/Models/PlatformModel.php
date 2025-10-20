<?php

namespace Elwira\Models;

use PDOException;
use Exception;
use PDO;

class PlatformModel extends BaseModel
{
    public function getPlatformData()
    {
        return $this->query("SELECT * FROM settings")
            ->resultSet();
    }

    public function updatePlatform($id, $data, $file)
    {
        try {
            $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/static/' . PROJECT_NAME . '/images/uploads/';

            // Ambil logo lama
            $stmtOld = $this->prepare("SELECT light_logo, dark_logo FROM settings WHERE id = :id");
            $stmtOld->bind(':id', $id);
            $stmtOld->execute();
            $old = $stmtOld->single(PDO::FETCH_ASSOC);

            // Upload baru jika ada
            $newLightLogo = $this->uploadLogo($file['light_logo'], $old['light_logo'] ?? '', $uploadDirectory, 'light_');
            $newDarkLogo = $this->uploadLogo($file['dark_logo'], $old['dark_logo'] ?? '', $uploadDirectory, 'dark_');

            // Siapkan query update
            $sql = "UPDATE settings SET site_name = :site_name, site_version = :site_version";
            if ($newLightLogo) $sql .= ", light_logo = :light_logo";
            if ($newDarkLogo)  $sql .= ", dark_logo = :dark_logo";
            $sql .= " WHERE id = :id";

            $stmt = $this->prepare($sql);
            $stmt->bind(':site_name', $data['site_name']);
            $stmt->bind(':site_version', $data['site_version']);
            $stmt->bind(':id', $id);

            if ($newLightLogo) $stmt->bind(':light_logo', $newLightLogo);
            if ($newDarkLogo)  $stmt->bind(':dark_logo', $newDarkLogo);

            $stmt->execute();
            return true;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    private function uploadLogo($file, $oldFilename, $uploadDirectory, $prefix = 'logo_')
    {
        if (empty($file['name'])) {
            return null;
        }

        $filename = $file['name'];
        $tmp = $file['tmp_name'];
        $size = $file['size'];
        $allowedExtensions = ['png', 'jpg', 'jpeg'];
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (!in_array($ext, $allowedExtensions)) {
            throw new Exception('Ekstensi file tidak valid. Gunakan PNG, JPG, atau JPEG.');
        }

        if ($size > 2 * 1024 * 1024) {
            throw new Exception('Ukuran file terlalu besar. Maksimal 2MB.');
        }

        $newFilename = uniqid($prefix) . '.' . $ext;

        if (!move_uploaded_file($tmp, $uploadDirectory . $newFilename)) {
            throw new Exception('Gagal mengupload file.');
        }

        if ($oldFilename && file_exists($uploadDirectory . $oldFilename)) {
            unlink($uploadDirectory . $oldFilename);
        }

        return $newFilename;
    }

    public function updateCountry($country_id, $country_name, $fee_rate, $country_status)
    {
        $sql = $this->prepare("UPDATE countries SET country_name = :country_name, fee_rate = :fee_rate, is_active = :active_status WHERE id = :country_id")
            ->bind(':country_name', $country_name)
            ->bind(':fee_rate', $fee_rate)
            ->bind(':active_status', $country_status)
            ->bind(':country_id', $country_id);

        $this->execute($sql);
    }

    public function getAllCountriesData()
    {
        try {
            $sql = "SELECT * FROM countries";
            return $this->query($sql)->resultSet(); // Mengambil semua hasil dalam bentuk array
        } catch (PDOException $e) {
            error_log('Error fetching countries: ' . $e->getMessage());
            throw $e;
        }
    }
}
