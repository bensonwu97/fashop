<?php
/**
 * 文章数据模型
 *
 *
 *
 *
 * @copyright  Copyright (c) 2016-2017 MoJiKeJi Inc. (http://www.fashop.cn)
 * @license    http://www.fashop.cn
 * @link       http://www.fashop.cn
 * @since      File available since Release v1.1
 */
namespace App\Model;
use ezswoole\Model;
use traits\model\SoftDelete;
use EasySwoole\Core\Component\Di;

class Info extends Model {
	use SoftDelete;
    protected $deleteTime = 'delete_time';
    protected $resultSetType = 'collection';

	/**
	 * 添加
	 * @datetime 2017-05-18 18:11:40
	 * @author 韩文博
	 * @param  array $data
	 * @return int pk
	 */
	public function addInfo($data = array()) {
		$data['create_time'] = time();
		$result              = $this->allowField(true)->save($data);
		if ($result) {
			return $this->getLastInsID();
		}
		return $result;
	}
	/**
	 * 添加多条
	 * @datetime 2017-05-18 18:11:40
	 * @author 韩文博
	 * @param array $data
	 * @return boolean
	 */
	public function addInfoAll($data) {
		return $this->insertAll($data);
	}
	/**
	 * 修改
	 * @datetime 2017-05-18 18:11:40
	 * @author 韩文博
	 * @param    array $condition
	 * @param    array $data
	 * @return   boolean
	 */
	public function editInfo($condition = array(), $data = array()) {
		return $this->where($condition)->update($data);
	}
	/**
	 * 删除
	 * @datetime 2017-05-18 18:11:40
	 * @author 韩文博
	 * @param    array $condition
	 * @return   boolean
	 */
	public function delInfo($condition = array()) {
		return $this->where($condition)->delete();
	}
	/**
	 * 计算数量
	 * @datetime 2017-05-18 18:11:40
	 * @author 韩文博
	 * @param array $condition 条件
	 * @return int
	 */
	public function getInfoCount($condition) {
		return $this->where($condition)->count();
	}
	/**
	 * 获取文章单条数据
	 * @datetime 2017-05-18 18:11:40
	 * @author 韩文博
	 * @param array $condition 条件
	 * @param string $field 字段
	 * @return array | false
	 */
	public function getInfoInfo($condition = array(), $field = '*') {
		$info = $this->where($condition)->field($field)->find();
		return $info ? $info->toArray() : false;
	}
	/**
	 * 获得文章列表
	 * @datetime 2017-05-18 18:11:40
	 * @author 韩文博
	 * @param    array $condition
	 * @param    string $field
	 * @param    string $order
	 * @param    string $page
	 * @return   array | false
	 */
	public function getInfoList($condition = array(), $field = '*', $order = 'id asc', $page = '1,10') {
		$list = $this->where($condition)->order($order)->field($field)->page($page)->select();
		return $list ? $list->toArray() : false;
	}

    /**
     * 软删除
     * @param    array  $condition
     */
    public function softDelInfo($condition) {
        return $this->where($condition)->find()->delete();
    }
}
?>