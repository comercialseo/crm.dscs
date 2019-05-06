<?php
namespace Cache\Controller\Component;

use Cache\View\PartialCacheView;
use Cake\Controller\Component;
use Cake\Core\Configure;
use Cake\Event\Event;

/**
 */
class PartialCacheComponent extends Component {

	/**
	 * Default config
	 *
	 * @var array
	 */
	protected $_defaultConfig = [
		'actions' => [],
		'compress' => false,
	];

	/**
	 * @param \Cake\Event\Event $event
	 * @return void
	 */
	public function startup(Event $event) {
		if (Configure::read('Cache.check') === false) {
			return null;
		}

		if (isset($this->request->params['_ext']) && $this->request->params['_ext'] !== 'html') {
			return;
		}

		$isActionCachable = $this->_isActionCachable();
		if ($isActionCachable === false) {
			return;
		}

		/** @var \Cake\Controller\Controller $controller */
		$controller = $event->getSubject();
		$builder = $controller->viewBuilder();
		if ($builder->getClassName()) {
			return;
		}

		$builder->setClassName(PartialCacheView::class);
		$duration = $isActionCachable === true ? null : $isActionCachable;
		$builder->setOptions(['duration' => $duration, 'compress' => $this->getConfig('compress')]);
	}

	/**
	 * @return bool|int|string
	 */
	protected function _isActionCachable() {
		$actions = $this->getConfig('actions');
		if (!$actions) {
			return true;
		}

		$action = $this->request->params['action'];

		if (array_key_exists($action, $actions)) {
			return $actions[$action];
		}
		if (in_array($action, $actions, true)) {
			return true;
		}
		return false;
	}

}
