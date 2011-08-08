<?php
/**
 * Base exception for all Buildiator exceptions.
 */
class BuildiatorException extends Exception {};

/**
 * Thrown when there is an error communicating with the CI Server
 */
class BuildiatorCIServerCommunicationException extends BuildiatorException {};

?>