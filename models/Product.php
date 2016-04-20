<?php

class Product
{
    const SHOW_BY_DEFAULT = 6;


    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT, $page = 1)
    {
        $count = intval($count);
        $page = intval($page);
        $offset = ($page-1)*$count;

        $db = Db::getConnection();

        $productsList = array();

        $result = $db->query('SELECT id, name, price, image, is_new FROM product WHERE status = "1" ORDER BY id LIMIT '
                            . $count . ' OFFSET ' . $offset);

        $i = 0;
        while ($row = $result->fetch()){
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $productsList;
    }


    public static function getNewProducts($count = self::SHOW_BY_DEFAULT, $page = 1)
    {
        $count = intval($count);
        $page = intval($page);
        $offset = ($page-1)*$count;

        $db = Db::getConnection();

        $productsList = array();
        $result = $db->query('SELECT id, name, price, image, is_new FROM product WHERE status = "1" AND is_new = "1" ORDER BY id LIMIT '
            . $count . ' OFFSET ' . $offset);

        $i = 0;
        while ($row = $result->fetch()){
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsList;
    }


    public static function getProductsListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {

            $page = intval($page);
            $offset = ($page-1)*self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();
            $products = array();
            $result = $db->query("SELECT id, name, price, image, is_new FROM product "
                                . "WHERE status = '1' AND category_id = " . $categoryId
                                . " ORDER BY id  "
                                . "LIMIT " . self::SHOW_BY_DEFAULT
                                . " OFFSET ". $offset);

            $i = 0;
            while ($row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['image'] = $row['image'];
                $products[$i]['is_new'] = $row['is_new'];
                $i++;
            }

            return $products;
        }
    }


    public static function getProductById($id)
    {
        $id = intval($id);

        if ($id){
            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM product WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }


    public static function getTotalProductsInCategory($categoryId)
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM product '
                            . 'WHERE status="1" AND category_id = "'.$categoryId.'"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }


    public static function getAllTotalProducts()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM product '
            . 'WHERE status="1"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }


    public static function getNewTotalProducts()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM product '
            . 'WHERE status="1" AND is_new="1"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }


    public static function getProductsByIds($idsArray)
    {
        $products = array();

        $db = Db::getConnection();

        $idsString = implode(',', $idsArray);

        $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()){
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }

        return $products;
    }


    public static function getProductsList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT id, name, price, code FROM product ORDER BY id ASC');
        $productsList = array();

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['code'] = $row['code'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
        }
        return $productsList;
    }


    public static function createProduct($options)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO product '
            . '(name, code, price, category_id, brand, availability,'
            . 'description, is_new, status)'
            . 'VALUES '
            . '(:name, :code, :price, :category_id, :brand, :availability,'
            . ':description, :is_new, :status)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }


    public static function updateProductById($id, $options)
    {
        $db = Db::getConnection();

        $sql = "UPDATE product
            SET
                name = :name,
                code = :code,
                price = :price,
                category_id = :category_id,
                brand = :brand,
                availability = :availability,
                description = :description,
                is_new = :is_new,
                status = :status
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
    }


    public static function deleteProductById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM product WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }


    public static function getImage($id)
    {
        $noImage = 'no-image.jpg';
        $path = '/upload/images/products/';
        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            return $pathToProductImage;
        }

        return $path . $noImage;
    }


    public static function searchProduct($query) {

        if (!empty($query))
        {
            if (strlen($query) < 3) {
                $text = '<p class="text-header">Слишком короткий поисковый запрос.</p>';
            } else if (strlen($query) > 128) {
                $text = '<p class="text-header">Слишком длинный поисковый запрос.</p>';
            } else {

                $db = Db::getConnection();

                $query = trim($query);
                $query = htmlspecialchars($query);
                $productsList = array();

                $q = $db->query('SELECT id, name, price, is_new FROM product WHERE (name LIKE "%' . $query . '%") AND (status = "1")');

                $i = 0;
                while ($row = $q->fetch()) {
                    $productsList[$i]['id'] = $row['id'];
                    $productsList[$i]['name'] = $row['name'];
                    $productsList[$i]['price'] = $row['price'];
                    $productsList[$i]['is_new'] = $row['is_new'];
                    $i++;
                }

                if (!(empty($productsList))) {
                   $text = $productsList;
                } else { $text = '<p class="text-header">По вашему запросу ничего не найдено.</p>';}

            }
        } else {
            $text = '<p class="text-header">Задан пустой поисковый запрос.</p>';
        }
        return $text;
    }


    public static function SortProductsPriceDown($count = self::SHOW_BY_DEFAULT, $page = 1) {
        $count = intval($count);
        $page = intval($page);
        $offset = ($page-1)*$count;

        $db = Db::getConnection();

        $productsList = array();

        $result = $db->query('SELECT id, name, price, image, is_new FROM product WHERE status = "1" ORDER BY price DESC LIMIT '
            . $count . ' OFFSET ' . $offset);

        $i = 0;
        while ($row = $result->fetch()){
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $productsList;
    }

    public static function SortProductsPriceUp($count = self::SHOW_BY_DEFAULT, $page = 1) {
        $count = intval($count);
        $page = intval($page);
        $offset = ($page-1)*$count;

        $db = Db::getConnection();

        $productsList = array();

        $result = $db->query('SELECT id, name, price, image, is_new FROM product WHERE status = "1" ORDER BY price ASC LIMIT '
            . $count . ' OFFSET ' . $offset);

        $i = 0;
        while ($row = $result->fetch()){
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $productsList;
    }

    public static function SortProductsNameDown($count = self::SHOW_BY_DEFAULT, $page = 1) {
        $count = intval($count);
        $page = intval($page);
        $offset = ($page-1)*$count;

        $db = Db::getConnection();

        $productsList = array();

        $result = $db->query('SELECT id, name, price, brand, image, is_new FROM product WHERE status = "1" ORDER BY brand DESC LIMIT '
            . $count . ' OFFSET ' . $offset);

        $i = 0;
        while ($row = $result->fetch()){
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $productsList;
    }

    public static function SortProductsNameUp($count = self::SHOW_BY_DEFAULT, $page = 1) {
        $count = intval($count);
        $page = intval($page);
        $offset = ($page-1)*$count;

        $db = Db::getConnection();

        $productsList = array();

        $result = $db->query('SELECT id, name, price, brand, image, is_new FROM product WHERE status = "1" ORDER BY brand ASC LIMIT '
            . $count . ' OFFSET ' . $offset);

        $i = 0;
        while ($row = $result->fetch()){
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $productsList;
    }

    public static function PriceDownProductsListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {

            $page = intval($page);
            $offset = ($page-1)*self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();
            $products = array();
            $result = $db->query("SELECT id, name, price, image, is_new FROM product "
                . "WHERE status = '1' AND category_id = " . $categoryId
                . " ORDER BY price DESC  "
                . "LIMIT " . self::SHOW_BY_DEFAULT
                . " OFFSET ". $offset);

            $i = 0;
            while ($row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['image'] = $row['image'];
                $products[$i]['is_new'] = $row['is_new'];
                $i++;
            }

            return $products;
        }
    }

    public static function PriceUpProductsListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {

            $page = intval($page);
            $offset = ($page-1)*self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();
            $products = array();
            $result = $db->query("SELECT id, name, price, image, is_new FROM product "
                . "WHERE status = '1' AND category_id = " . $categoryId
                . " ORDER BY price ASC  "
                . "LIMIT " . self::SHOW_BY_DEFAULT
                . " OFFSET ". $offset);

            $i = 0;
            while ($row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['image'] = $row['image'];
                $products[$i]['is_new'] = $row['is_new'];
                $i++;
            }

            return $products;
        }
    }

    public static function NameDownProductsListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {

            $page = intval($page);
            $offset = ($page-1)*self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();
            $products = array();
            $result = $db->query("SELECT id, name, price, brand, image, is_new FROM product "
                . "WHERE status = '1' AND category_id = " . $categoryId
                . " ORDER BY brand DESC  "
                . "LIMIT " . self::SHOW_BY_DEFAULT
                . " OFFSET ". $offset);

            $i = 0;
            while ($row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['image'] = $row['image'];
                $products[$i]['is_new'] = $row['is_new'];
                $i++;
            }

            return $products;
        }
    }

    public static function NameUpProductsListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {

            $page = intval($page);
            $offset = ($page-1)*self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();
            $products = array();
            $result = $db->query("SELECT id, name, price, brand, image, is_new FROM product "
                . "WHERE status = '1' AND category_id = " . $categoryId
                . " ORDER BY brand ASC  "
                . "LIMIT " . self::SHOW_BY_DEFAULT
                . " OFFSET ". $offset);

            $i = 0;
            while ($row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['image'] = $row['image'];
                $products[$i]['is_new'] = $row['is_new'];
                $i++;
            }

            return $products;
        }
    }

}
