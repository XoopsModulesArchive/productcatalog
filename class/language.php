<?php

require_once XOOPS_ROOT_PATH . '/kernel/object.php';

    /**
     * Defines a language.
     */
    class Language extends XoopsObject
    {
        public function __construct()
        {
            $this->XoopsObject();

            $this->initVar('id', XOBJ_DTYPE_INT, null, false);

            $this->initVar('name', XOBJ_DTYPE_TXTBOX, null, true, 255);
        }
    }

    /**
     * DAO
     */
    class ProductCatalogueLanguageHandler extends XoopsObjectHandler
    {
        public function LanguageHandler($db)
        {
            $this->XoopsObjectHandler($db);
        }

        public function &getInstance($db)
        {
            static $instance;

            if (!isset($instance)) {
                $instance = new LanguageHandler($db);
            }

            return $instance;
        }

        public function &create()
        {
            return new Language();
        }

        public function get($id)
        {
            $id = (int)$id;

            if ($id > 0) {
                $sql = 'SELECT * FROM ' . $this->db->prefix('prca_languages') . ' WHERE id=' . $id;

                if (!$result = $this->db->queryF($sql)) {
                    return false;
                }

                $numrows = $this->db->getRowsNum($result);

                if (1 == $numrows) {
                    $language = new Language();

                    $language->assignVars($this->db->fetchArray($result));

                    return $language;
                }
            }

            return false;
        }

        public function insert(XoopsObject $language)
        {
            if ('language' != get_class($language)) {
                return false;
            }

            if (!$language->cleanVars()) {
                return false;
            }

            foreach ($language->cleanVars as $k => $v) {
                ${$k} = $v;
            }

            if (empty($id)) {
                $sql = 'INSERT INTO ' . $this->db->prefix('prca_languages') . ' (name) VALUES (' . $this->db->quoteString($name) . ')';
            } else {
                $sql = 'UPDATE ' . $this->db->prefix('prca_languages') . ' SET name=' . $this->db->quoteString($name) . ' WHERE id=' . $id;
            }

            if (!$result = $this->db->queryF($sql)) {
                error_log('geen insert', 0);

                return false;
            }

            if (empty($id)) {
                $id = $this->db->getInsertId();
            }

            $language->assignVar('id', $id);

            return $id;
        }

        public function delete(XoopsObject $language)
        {
            if ('language' != get_class($language)) {
                return false;
            }

            $sql = sprintf('DELETE FROM %s WHERE id = %u', $this->db->prefix('prca_languages'), $language->getVar('id'));

            if (!$result = $this->db->queryF($sql)) {
                error_log("RESULT: $result", 0);

                return false;
            }

            return true;
        }

        public function &getObjects($criteria = null)
        {
            $ret = [];

            $limit = $start = 0;

            $sql = 'SELECT * FROM ' . $this->db->prefix('prca_languages');

            if (isset($criteria) && is_subclass_of($criteria, 'criteriaelement')) {
                $sql .= ' ' . $criteria->renderWhere();

                $sql .= ' ORDER BY name ' . $criteria->getOrder();

                $limit = $criteria->getLimit();

                $start = $criteria->getStart();
            }

            $result = $this->db->queryF($sql, $limit, $start);

            if (!$result) {
                return $ret;
            }

            while (false !== ($myrow = $this->db->fetchArray($result))) {
                $language = new Language();

                $language->assignVars($myrow);

                $ret[] = &$language;

                unset($language);
            }

            return $ret;
        }
    }
