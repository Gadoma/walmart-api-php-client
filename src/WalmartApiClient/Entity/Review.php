<?php

/**
 * Review entity DTO
 *
 * @package     Walmart API PHP Client
 * @author      Piotr Gadzinski <dev@gadoma.com>
 * @copyright   Copyright (c) 2016
 * @license     MIT
 * @since       06/04/2016
 */
namespace WalmartApiClient\Entity;

/**
 * @codeCoverageIgnore
 * @SuppressWarnings(PHPMD)
 */
class Review extends AbstractEntity implements ReviewInterface
{

    /**
     *
     * @var array Review product name
     */
    private $name;

    /**
     *
     * @var array Review rating attributes
     */
    private $overallRating;

    /**
     *
     * @var array Review product attributes
     */
    private $productAttributes;

    /**
     *
     * @var string Reviewer name
     */
    private $reviewer;

    /**
     *
     * @var string Review text
     */
    private $reviewText;

    /**
     *
     * @var string Review time of submission
     */
    private $submissionTime;

    /**
     *
     * @var string Review title
     */
    private $title;

    /**
     *
     * @var string Review upvotes 
     */
    private $upVotes;

    /**
     *
     * @var string Review downvotes 
     */
    private $downVotes;

    /**
     * @return array
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @param array $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


    /**
     * @return array
     */
    public function getOverallRating()
    {
        return $this->overallRating;
    }


    /**
     * @param array $overallRating
     */
    public function setOverallRating($overallRating)
    {
        $this->overallRating = $overallRating;
    }


    /**
     * @return array
     */
    public function getProductAttributes()
    {
        return $this->productAttributes;
    }


    /**
     * @param array $productAttributes
     */
    public function setProductAttributes($productAttributes)
    {
        $this->productAttributes = $productAttributes;
    }


    /**
     * @return string
     */
    public function getReviewer()
    {
        return $this->reviewer;
    }


    /**
     * @param string $reviewer
     */
    public function setReviewer($reviewer)
    {
        $this->reviewer = $reviewer;
    }


    /**
     * @return string
     */
    public function getReviewText()
    {
        return $this->reviewText;
    }


    /**
     * @param string $reviewText
     */
    public function setReviewText($reviewText)
    {
        $this->reviewText = $reviewText;
    }


    /**
     * @return string
     */
    public function getSubmissionTime()
    {
        return $this->submissionTime;
    }


    /**
     * @param string $submissionTime
     */
    public function setSubmissionTime($submissionTime)
    {
        $this->submissionTime = $submissionTime;
    }


    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }


    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }


    /**
     * @return string
     */
    public function getUpVotes()
    {
        return $this->upVotes;
    }


    /**
     * @param string $upVotes
     */
    public function setUpVotes($upVotes)
    {
        $this->upVotes = $upVotes;
    }


    /**
     * @return string
     */
    public function getDownVotes()
    {
        return $this->downVotes;
    }


    /**
     * @param string $downVotes
     */
    public function setDownVotes($downVotes)
    {
        $this->downVotes = $downVotes;
    }
}
