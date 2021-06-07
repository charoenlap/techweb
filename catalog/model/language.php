<?php 
	class LanguageModel extends db {
		public function language($data = array()){
			$result = array();
			if(!empty($data)){
				$lang = $this->query('SELECT * FROM m_language');
				$result = $lang->rows;
			}
			return $result;
		}
		public function setting_language($data = array()){
			$result = array();
			$lang_detail = $this->query('SELECT * FROM m_language_setting_detail');
			foreach($lang_detail->rows as $key => $val){
				$result[$val['key_name']][$val['lang_id']] = $val['value'];
			}
			return $result;
		}

	}
?>