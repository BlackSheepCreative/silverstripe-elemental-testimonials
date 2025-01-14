<?php

namespace Dynamic\Elements\Model;

use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;
use SilverStripe\Security\PermissionProvider;
use SilverStripe\ORM\FieldType\DBVarchar;
use SilverStripe\ORM\FieldType\DBText;

/**
 * Class Testimonial
 * @package Dynamic\Elements\Model
 *
 * @property string $Title
 * @property string $Content
 * @property string $Name
 * @property string $Position
 * @property string $Affiliation
 */
class Testimonial extends DataObject implements PermissionProvider
{
    /**
     * @var string
     */
    private static string $singular_name = 'Testimonial';

    /**
     * @var string
     */
    private static string $plural_name = 'Testimonials';

    /**
     * @var string
     */
    private static string $table_name = 'Testimonial';

    /**
     * @var array
     */
    private static array $db = [
        'Title' => DBVarchar::class,
        'Content' => DBText::class,
        'Name' => DBVarchar::class,
        'Position' => DBVarchar::class,
        'Affiliation' => DBVarchar::class,
    ];

    /**
     * @var array
     */
    private static array $many_many = [
        'TestimonialCategories' => TestimonialCategory::class,
    ];

    /**
     * @var array
     */
    private static array $field_labels = [
        'Title' => 'Title',
        'Content.Summary' => 'Testimonial',
        'Name' => 'Name',
    ];

    /**
     *
     * @var array
     */
    private static array $summary_fields = [
        'Title',
        'Content.Summary',
        'Name',
    ];

    /**
     * @return array
     */
    public function providePermissions()
    {
        return ['Testimonial_MANAGE' => 'Manage Testimonials'];
    }

    /**
     * @param null $member
     * @param array $context
     * @return bool|int
     */
    public function canCreate($member = null, $context = [])
    {
        return Permission::check('Testimonial_MANAGE', 'any', $member);
    }

    /**
     * @param null $member
     * @return bool|int
     */
    public function canEdit($member = null)
    {
        return Permission::check('Testimonial_MANAGE', 'any', $member);
    }

    /**
     * @param null $member
     * @return bool|int
     */
    public function canDelete($member = null)
    {
        return Permission::check('Testimonial_MANAGE', 'any', $member);
    }

    /**
     * @param null $member
     * @return bool
     */
    public function canView($member = null)
    {
        return true;
    }
}
