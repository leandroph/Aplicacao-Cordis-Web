<?php
class NotificacaoSms
{
	/**Declaração de propriedade */
	private $id_notificacao;
	private $api_key;

	/**
	 * Get the value of api_key
	 */ 
	public function getApi_Key()
	{
		return $this->api_key;
	}

	/**
	 * Set the value of api_key
	 *
	 * @return  self
	 */ 
	public function setApi_Key($api_key)
	{
		$this->api_key = $api_key;

		return $this;
	}

	/**
	 * Get the value of id_notificacao
	 */ 
	public function getId_Notificacao()
	{
		return $this->id_notificacao;
	}

	/**
	 * Set the value of id_notificacao
	 *
	 * @return  self
	 */ 
	public function setId_Notificacao($id_notificacao)
	{
		$this->id_notificacao = $id_notificacao;

		return $this;
	}
}
