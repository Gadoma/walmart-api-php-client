<?php

/**
 * Review entity interface
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       06/04/2016
 */
namespace WalmartApiClient\Entity;

interface ReviewInterface
{

    /**
     * @return array
     */
    public function getName();

    /**
     * @param array $name
     */
    public function setName($name);

    /**
     * @return array
     */
    public function getOverallRating();

    /**
     * @param array $overallRating
     */
    public function setOverallRating($overallRating);

    /**
     * @return array
     */
    public function getProductAttributes();

    /**
     * @param array $productAttributes
     */
    public function setProductAttributes($productAttributes);

    /**
     * @return string
     */
    public function getReviewer();

    /**
     * @param string $reviewer
     */
    public function setReviewer($reviewer);

    /**
     * @return string
     */
    public function getReviewText();

    /**
     * @param string $reviewText
     */
    public function setReviewText($reviewText);

    /**
     * @return string
     */
    public function getSubmissionTime();

    /**
     * @param string $submissionTime
     */
    public function setSubmissionTime($submissionTime);

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getUpVotes();

    /**
     * @param string $upVotes
     */
    public function setUpVotes($upVotes);

    /**
     * @return string
     */
    public function getDownVotes();

    /**
     * @param string $downVotes
     */
    public function setDownVotes($downVotes);
}
