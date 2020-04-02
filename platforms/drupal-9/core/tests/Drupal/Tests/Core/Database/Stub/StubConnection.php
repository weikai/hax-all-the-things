<?php

namespace Drupal\Tests\Core\Database\Stub;

use Drupal\Core\Database\Connection;
use Drupal\Core\Database\StatementEmpty;

/**
 * A stub of the abstract Connection class for testing purposes.
 *
 * Includes minimal implementations of Connection's abstract methods.
 */
class StubConnection extends Connection {

  /**
   * Public property so we can test driver loading mechanism.
   *
   * @var string
   * @see driver().
   */
  public $driver = 'stub';

  /**
   * The identifier quote character. Can be set in the constructor for testing.
   *
   * @var string
   */
  protected $identifierQuote = '';

  /**
   * Constructs a Connection object.
   *
   * @param \PDO $connection
   *   An object of the PDO class representing a database connection.
   * @param array $connection_options
   *   An array of options for the connection.
   * @param string $identifier_quote
   *   The identifier quote character. Defaults to an empty string.
   */
  public function __construct(\PDO $connection, array $connection_options, $identifier_quote = '') {
    $this->identifierQuote = $identifier_quote;
    parent::__construct($connection, $connection_options);
  }

  /**
   * {@inheritdoc}
   */
  protected function identifierQuote() {
    return $this->identifierQuote;
  }

  /**
   * {@inheritdoc}
   */
  public function queryRange($query, $from, $count, array $args = [], array $options = []) {
    return new StatementEmpty();
  }

  /**
   * {@inheritdoc}
   */
  public function queryTemporary($query, array $args = [], array $options = []) {
    return '';
  }

  /**
   * {@inheritdoc}
   */
  public function driver() {
    return $this->driver;
  }

  /**
   * {@inheritdoc}
   */
  public function databaseType() {
    return 'stub';
  }

  /**
   * {@inheritdoc}
   */
  public function createDatabase($database) {
    return;
  }

  /**
   * {@inheritdoc}
   */
  public function mapConditionOperator($operator) {
    return NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function nextId($existing_id = 0) {
    return 0;
  }

}