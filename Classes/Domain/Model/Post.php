<?php

declare(strict_types=1);

namespace Rms\Typo3Blog\Domain\Model;

use TYPO3\CMS\Extbase\Annotation\ORM\Cascade;
use TYPO3\CMS\Extbase\Annotation\Validate;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * This file is part of the "Typo3Blog" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Mike <mkettel@gmail.com>, visisblebits.de
 */
/**
 * Single typo3_blog post
 */
class Post extends AbstractEntity
{
    /**
     * single_view_layout
     *
     * @var string
     */
    #[Validate(['validator' => 'NotEmpty'])]
    protected $singleViewLayout = '';

    /**
     * title
     *
     * @var string
     */
    #[Validate(['validator' => 'NotEmpty'])]
    protected $title = '';

    /**
     * typo3_blog teaser
     *
     * @var string
     */
    #[Validate(['validator' => 'NotEmpty'])]
    protected $teaser = '';

    /**
     * one or more typo3_blog images
     *
     * @var ObjectStorage<FileReference>
     */
    #[Validate(['validator' => 'NotEmpty'])]
    #[Cascade(['value' => 'remove'])]
    protected $images;

    /**
     * typo3_blog content
     *
     * @var string
     */
    #[Validate(['validator' => 'NotEmpty'])]
    protected $content = '';

    /**
     * Categories for this post
     *
     * @var ObjectStorage<Category>
     */
    protected $categories;

    /**
     * slug
     *
     * @var string
     */
    #[Validate(['validator' => 'NotEmpty'])]
    protected $slug = '';

    protected string $keywords = '';

    /**
     * @var \DateTime
     */
    protected $crdate;

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject(): void
    {
        $this->categories =  new ObjectStorage();
        $this->images = new ObjectStorage();
    }

    /**
     * Returns the single_view_layout
     */
    public function getSingleViewLayout(): string
    {
        return $this->singleViewLayout;
    }

    /**
     * Sets the single_view_layout
     */
    public function setSingleViewLayout(string $singleViewLayout): void
    {
        $this->singleViewLayout = $singleViewLayout;
    }

    /**
     * Returns the title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Sets the title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Returns the teaser
     */
    public function getTeaser(): string
    {
        return $this->teaser;
    }

    /**
     * Sets the teaser
     */
    public function setTeaser(string $teaser): void
    {
        $this->teaser = $teaser;
    }

    /**
     * Returns the images
     *
     * @return ObjectStorage<FileReference>
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Sets the images
     *
     * @param ObjectStorage<FileReference> $images
     */
    public function setImages(ObjectStorage $images): void
    {
        $this->images = $images;
    }

    /**
     * Returns the content
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Sets the content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * Adds a Category
     */
    public function addCategory(Category $category): void
    {
        $this->categories->attach($category);
    }

    /**
     * Removes a Category
     *
     * @param Category $categoryToRemove The Category to be removed
     */
    public function removeCategory(Category $categoryToRemove): void
    {
        $this->categories->detach($categoryToRemove);
    }

    /**
     * Returns the categories
     *
     * @return ObjectStorage<Category>
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Sets the categories
     *
     * @param ObjectStorage<Category> $categories
     * @return void
     */
    public function setCategories(ObjectStorage $categories): void
    {
        $this->categories = $categories;
    }

    /**
     * Returns the slug
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * Sets the slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * Returns the creation date
     *
     * @return \DateTime $crdate
     */
    public function getCrdate()
    {
        return $this->crdate;
    }

    public function getKeywords(): string
    {
        return $this->keywords;
    }

    public function setKeywords(string $keywords): void
    {
        $this->keywords = $keywords;
    }
}
