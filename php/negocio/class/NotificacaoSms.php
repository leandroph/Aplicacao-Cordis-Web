<?php
class Notificacao
{
	/**Declaração de propriedade */
	private $apiKey;

	/**Geters and Seters */

	/**
	 * setApiKey
	 *
	 * @param  mixed $apiKey
	 *
	 * @return void
	 */
	public function setApiKey($apiKey)
	{
		$this->apiKey = $apiKey;
	}

	/**
	 * getApiKey
	 *
	 * @return void
	 */
	public function getApiKey()
	{
		return $this->apiKey;
	}
}
