<?php namespace Stevenmaguire\Services\Trello\Traits;

trait OrganizationTrait
{
    /**
     * @return Stevenmaguire\Services\Trello\Http
     */
    abstract public function getHttp();

    /**
     * @param array  $attributes
     *
     * @return object
     */
    public function addOrganization($attributes = [])
    {
        return $this->getHttp()->post('organizations', $attributes);
    }

    /**
     * @param string $organizationId
     *
     * @return object
     */
    public function deleteOrganization($organizationId)
    {
        return $this->getHttp()->delete(sprintf('organizations/%s', $organizationId));
    }

    /**
     * @param string $organizationId
     *
     * @return object
     */
    public function getOrganization($organizationId)
    {
        return $this->getHttp()->get(sprintf('organizations/%s', $organizationId));
    }

    /**
     * @param string $organizationId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateOrganization($organizationId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('organizations/%s', $organizationId), $attributes);
    }

    /**
     * @param string $organizationId
     * @param string $fieldName
     *
     * @return object
     */
    public function getOrganizationField($organizationId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('organizations/%s/%s', $organizationId, $fieldName));
    }

    /**
     * @param string $organizationId
     *
     * @return object
     */
    public function getOrganizationActions($organizationId)
    {
        return $this->getHttp()->get(sprintf('organizations/%s/actions', $organizationId));
    }

    /**
     * @param string $organizationId
     *
     * @return object
     */
    public function getOrganizationBoards($organizationId)
    {
        return $this->getHttp()->get(sprintf('organizations/%s/boards', $organizationId));
    }

    /**
     * @param string $organizationId
     * @param string $filter
     *
     * @return object
     */
    public function getOrganizationBoardsFilter($organizationId, $filter)
    {
        return $this->getHttp()->get(sprintf('organizations/%s/boards/%s', $organizationId, $filter));
    }

    /**
     * @param string $organizationId
     *
     * @return object
     */
    public function getOrganizationDeltas($organizationId)
    {
        return $this->getHttp()->get(sprintf('organizations/%s/deltas', $organizationId));
    }

    /**
     * @param string $organizationId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateOrganizationDesc($organizationId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('organizations/%s/desc', $organizationId), $attributes);
    }

    /**
     * @param string $organizationId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateOrganizationDisplayName($organizationId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('organizations/%s/displayName', $organizationId), $attributes);
    }

    /**
     * @param string $organizationId
     *
     * @return object
     */
    public function deleteOrganizationLogo($organizationId)
    {
        return $this->getHttp()->delete(sprintf('organizations/%s/logo', $organizationId));
    }

    /**
     * @param string $organizationId
     * @param array  $attributes
     *
     * @return object
     */
    public function addOrganizationLogo($organizationId, $attributes = [])
    {
        return $this->getHttp()->post(sprintf('organizations/%s/logo', $organizationId), $attributes);
    }

    /**
     * @param string $organizationId
     *
     * @return object
     */
    public function getOrganizationMembers($organizationId)
    {
        return $this->getHttp()->get(sprintf('organizations/%s/members', $organizationId));
    }

    /**
     * @param string $organizationId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateOrganizationMembers($organizationId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('organizations/%s/members', $organizationId), $attributes);
    }

    /**
     * @param string $organizationId
     * @param string $memberId
     *
     * @return object
     */
    public function deleteOrganizationMember($organizationId, $memberId)
    {
        return $this->getHttp()->delete(sprintf('organizations/%s/members/%s', $organizationId, $memberId));
    }

    /**
     * @param string $organizationId
     * @param string $filter
     *
     * @return object
     */
    public function getOrganizationMembersFilter($organizationId, $filter)
    {
        return $this->getHttp()->get(sprintf('organizations/%s/members/%s', $organizationId, $filter));
    }

    /**
     * @param string $organizationId
     * @param string $memberId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateOrganizationMember($organizationId, $memberId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('organizations/%s/members/%s', $organizationId, $memberId), $attributes);
    }

    /**
     * @param string $organizationId
     * @param string $memberId
     *
     * @return object
     */
    public function deleteOrganizationMemberAll($organizationId, $memberId)
    {
        return $this->getHttp()->delete(sprintf('organizations/%s/members/%s/all', $organizationId, $memberId));
    }

    /**
     * @param string $organizationId
     * @param string $memberId
     *
     * @return object
     */
    public function getOrganizationMemberCards($organizationId, $memberId)
    {
        return $this->getHttp()->get(sprintf('organizations/%s/members/%s/cards', $organizationId, $memberId));
    }

    /**
     * @param string $organizationId
     * @param string $memberId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateOrganizationMemberDeactivated($organizationId, $memberId, $attributes = [])
    {
        return $this->getHttp()->put(
            sprintf('organizations/%s/members/%s/deactivated', $organizationId, $memberId),
            $attributes
        );
    }

    /**
     * @param string $organizationId
     *
     * @return object
     */
    public function getOrganizationMemberships($organizationId)
    {
        return $this->getHttp()->get(sprintf('organizations/%s/memberships', $organizationId));
    }

    /**
     * @param string $organizationId
     * @param string $membershipId
     *
     * @return object
     */
    public function getOrganizationMembership($organizationId, $membershipId)
    {
        return $this->getHttp()->get(sprintf('organizations/%s/memberships/%s', $organizationId, $membershipId));
    }

    /**
     * @param string $organizationId
     * @param string $membershipId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateOrganizationMembership($organizationId, $membershipId, $attributes = [])
    {
        return $this->getHttp()->put(
            sprintf('organizations/%s/memberships/%s', $organizationId, $membershipId),
            $attributes
        );
    }

    /**
     * @param string $organizationId
     *
     * @return object
     */
    public function getOrganizationMembersInvited($organizationId)
    {
        return $this->getHttp()->get(sprintf('organizations/%s/membersInvited', $organizationId));
    }

    /**
     * @param string $organizationId
     * @param string $fieldName
     *
     * @return object
     */
    public function getOrganizationMembersInvitedField($organizationId, $fieldName)
    {
        return $this->getHttp()->get(sprintf('organizations/%s/membersInvited/%s', $organizationId, $fieldName));
    }

    /**
     * @param string $organizationId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateOrganizationName($organizationId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('organizations/%s/name', $organizationId), $attributes);
    }

    /**
     * @param string $organizationId
     *
     * @return object
     */
    public function deleteOrganizationPrefAssociatedDomain($organizationId)
    {
        return $this->getHttp()->delete(sprintf('organizations/%s/prefs/associatedDomain', $organizationId));
    }

    /**
     * @param string $organizationId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateOrganizationPrefAssociatedDomain($organizationId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('organizations/%s/prefs/associatedDomain', $organizationId), $attributes);
    }

    /**
     * @param string $organizationId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateOrganizationPrefBoardVisibilityRestrictOrg($organizationId, $attributes = [])
    {
        return $this->getHttp()->put(
            sprintf('organizations/%s/prefs/boardVisibilityRestrict/org', $organizationId),
            $attributes
        );
    }

    /**
     * @param string $organizationId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateOrganizationPrefBoardVisibilityRestrictPrivate($organizationId, $attributes = [])
    {
        return $this->getHttp()->put(
            sprintf('organizations/%s/prefs/boardVisibilityRestrict/private', $organizationId),
            $attributes
        );
    }

    /**
     * @param string $organizationId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateOrganizationPrefBoardVisibilityRestrictPublic($organizationId, $attributes = [])
    {
        return $this->getHttp()->put(
            sprintf('organizations/%s/prefs/boardVisibilityRestrict/public', $organizationId),
            $attributes
        );
    }

    /**
     * @param string $organizationId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateOrganizationPrefExternalMembersDisabled($organizationId, $attributes = [])
    {
        return $this->getHttp()->put(
            sprintf('organizations/%s/prefs/externalMembersDisabled', $organizationId),
            $attributes
        );
    }

    /**
     * @param string $organizationId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateOrganizationPrefGoogleAppsVersion($organizationId, $attributes = [])
    {
        return $this->getHttp()->put(
            sprintf('organizations/%s/prefs/googleAppsVersion', $organizationId),
            $attributes
        );
    }

    /**
     * @param string $organizationId
     *
     * @return object
     */
    public function deleteOrganizationPrefOrgInviteRestrict($organizationId)
    {
        return $this->getHttp()->delete(sprintf('organizations/%s/prefs/orgInviteRestrict', $organizationId));
    }

    /**
     * @param string $organizationId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateOrganizationPrefOrgInviteRestrict($organizationId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('organizations/%s/prefs/orgInviteRestrict', $organizationId), $attributes);
    }

    /**
     * @param string $organizationId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateOrganizationPrefPermissionLevel($organizationId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('organizations/%s/prefs/permissionLevel', $organizationId), $attributes);
    }

    /**
     * @param string $organizationId
     * @param array  $attributes
     *
     * @return object
     */
    public function updateOrganizationWebsite($organizationId, $attributes = [])
    {
        return $this->getHttp()->put(sprintf('organizations/%s/website', $organizationId), $attributes);
    }
}
