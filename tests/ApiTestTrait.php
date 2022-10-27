<?php

namespace Stevenmaguire\Services\Trello\Tests;

use Stevenmaguire\Services\Trello\Exceptions\Exception;

trait ApiTestTrait
{
    public function testGetCurrentUser()
    {
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", "/members/me", "", $payload);

        $result = $this->client->getCurrentUser();

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetCurrentUserBoards()
    {
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", "/members/my/boards", "", $payload);

        $result = $this->client->getCurrentUserBoards();

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetCurrentUserPinnedBoards()
    {
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", "/members/my/boards/pinned", "", $payload);

        $result = $this->client->getCurrentUserPinnedBoards();

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetCurrentUserCards()
    {
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", "/members/my/cards", "", $payload);

        $result = $this->client->getCurrentUserCards();

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetCurrentUserOrganizations()
    {
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", "/members/my/organizations", "", $payload);

        $result = $this->client->getCurrentUserOrganizations();

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteAction()
    {
        $actionId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/actions/%s", $actionId), "", $payload);

        $result = $this->client->deleteAction($actionId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetAction()
    {
        $actionId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/actions/%s", $actionId), "", $payload);

        $result = $this->client->getAction($actionId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateAction()
    {
        $actionId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/actions/%s", $actionId), "", $payload);

        $result = $this->client->updateAction($actionId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetActionField()
    {
        $actionId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/actions/%s/%s", $actionId, $fieldName), "", $payload);

        $result = $this->client->getActionField($actionId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetActionBoard()
    {
        $actionId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/actions/%s/board", $actionId), "", $payload);

        $result = $this->client->getActionBoard($actionId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetActionBoardField()
    {
        $actionId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/actions/%s/board/%s", $actionId, $fieldName), "", $payload);

        $result = $this->client->getActionBoardField($actionId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetActionCard()
    {
        $actionId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/actions/%s/card", $actionId), "", $payload);

        $result = $this->client->getActionCard($actionId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetActionCardField()
    {
        $actionId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/actions/%s/card/%s", $actionId, $fieldName), "", $payload);

        $result = $this->client->getActionCardField($actionId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetActionEntities()
    {
        $actionId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/actions/%s/entities", $actionId), "", $payload);

        $result = $this->client->getActionEntities($actionId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetActionList()
    {
        $actionId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/actions/%s/list", $actionId), "", $payload);

        $result = $this->client->getActionList($actionId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetActionListField()
    {
        $actionId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/actions/%s/list/%s", $actionId, $fieldName), "", $payload);

        $result = $this->client->getActionListField($actionId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetActionMember()
    {
        $actionId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/actions/%s/member", $actionId), "", $payload);

        $result = $this->client->getActionMember($actionId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetActionMemberField()
    {
        $actionId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/actions/%s/member/%s", $actionId, $fieldName), "", $payload);

        $result = $this->client->getActionMemberField($actionId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetActionMemberCreator()
    {
        $actionId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/actions/%s/memberCreator", $actionId), "", $payload);

        $result = $this->client->getActionMemberCreator($actionId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetActionMemberCreatorField()
    {
        $actionId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/actions/%s/memberCreator/%s", $actionId, $fieldName), "", $payload);

        $result = $this->client->getActionMemberCreatorField($actionId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetActionOrganization()
    {
        $actionId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/actions/%s/organization", $actionId), "", $payload);

        $result = $this->client->getActionOrganization($actionId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetActionOrganizationField()
    {
        $actionId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/actions/%s/organization/%s", $actionId, $fieldName), "", $payload);

        $result = $this->client->getActionOrganizationField($actionId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateActionText()
    {
        $actionId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/actions/%s/text", $actionId), "", $payload);

        $result = $this->client->updateActionText($actionId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetAuthorize()
    {
        $payload = $this->getSuccessPayload();
        $attributes = $this->getTestAttributes();
        $this->prepareFor("GET", "/authorize", http_build_query($attributes), $payload);

        $result = $this->client->getAuthorize($attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBatchWithArray()
    {
        $payload = $this->getSuccessPayload();
        $attributes = $this->getTestAttributes();
        $attributes['urls'] = [uniqid(),uniqid(),uniqid(),uniqid()];
        $this->prepareFor("GET", "/batch", http_build_query(['urls' => $attributes['urls']]), $payload);

        $result = $this->client->getBatch($attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBatchWithString()
    {
        $payload = $this->getSuccessPayload();
        $attributes = $this->getTestAttributes();
        $attributes['urls'] = uniqid();
        $this->prepareFor("GET", "/batch", http_build_query(['urls' => [$attributes['urls']]]), $payload);

        $result = $this->client->getBatch($attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddBatchUrlsAndGetBatch()
    {
        $urlCount = rand(2, 10);
        $urls = [];
        for ($i = 0; $i < $urlCount; $i++) {
            $request = $this->client->getHttp()->getRequest('get', '/', [], false);
            $path = $request->getUri()->getPath();
            $this->client->addBatchUrl($path);
            $urls[] = $path;
        }

        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", "/batch", http_build_query(['urls' => $urls]), $payload);

        $result = $this->client->getBatch();

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBatchRetainsUrlsWithFailure()
    {
        $urlCount = rand(2, 10);
        $urls = [];
        for ($i = 0; $i < $urlCount; $i++) {
            $request = $this->client->getHttp()->getRequest('get', '/', [], false);
            $path = $request->getUri()->getPath();
            $this->client->addBatchUrl($path);
            $urls[] = $path;
        }
        $error = $this->getSuccessPayload();
        $this->prepareFor("GET", "/batch", http_build_query(['urls' => $urls]), $error, 401);

        try {
            $this->client->getBatch();
        } catch (Exception $e) {
            $result = $this->client->getBatchUrls();
            $this->assertExpectedEqualsResult($error, $e->getResponseBody());
        }

        $this->assertExpectedEqualsResult($urls, $result);
    }

    public function testAddBoard()
    {
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", "/boards", "", $payload);

        $result = $this->client->addBoard($attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoard()
    {
        $boardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s", $boardId), "", $payload);

        $result = $this->client->getBoard($boardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoard()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s", $boardId), "", $payload);

        $result = $this->client->updateBoard($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardField()
    {
        $boardId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/%s", $boardId, $fieldName), "", $payload);

        $result = $this->client->getBoardField($boardId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardActions()
    {
        $boardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/actions", $boardId), "", $payload);

        $result = $this->client->getBoardActions($boardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardBoardStars()
    {
        $boardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/boardStars", $boardId), "", $payload);

        $result = $this->client->getBoardBoardStars($boardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddBoardCalendarKeyGenerate()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/boards/%s/calendarKey/generate", $boardId), "", $payload);

        $result = $this->client->addBoardCalendarKeyGenerate($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardCards()
    {
        $parameters = ['before' => uniqid()];
        $boardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/cards", $boardId), http_build_query($parameters), $payload);

        $result = $this->client->getBoardCards($boardId, $parameters);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardCard()
    {
        $boardId = $this->getTestString();
        $cardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/cards/%s", $boardId, $cardId), "", $payload);

        $result = $this->client->getBoardCard($boardId, $cardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardCardsWithFilter()
    {
        $boardId = $this->getTestString();
        $filter = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/cards/%s", $boardId, $filter), "", $payload);

        $result = $this->client->getBoardCardsWithFilter($boardId, $filter);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardChecklists()
    {
        $boardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/checklists", $boardId), "", $payload);

        $result = $this->client->getBoardChecklists($boardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddBoardChecklist()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/boards/%s/checklists", $boardId), "", $payload);

        $result = $this->client->addBoardChecklist($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardClosed()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/closed", $boardId), "", $payload);

        $result = $this->client->updateBoardClosed($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardDeltas()
    {
        $boardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/deltas", $boardId), "", $payload);

        $result = $this->client->getBoardDeltas($boardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardDesc()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/desc", $boardId), "", $payload);

        $result = $this->client->updateBoardDesc($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddBoardEmailKeyGenerate()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/boards/%s/emailKey/generate", $boardId), "", $payload);

        $result = $this->client->addBoardEmailKeyGenerate($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardIdOrganization()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/idOrganization", $boardId), "", $payload);

        $result = $this->client->updateBoardIdOrganization($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardLabelNameBlue()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/labelNames/blue", $boardId), "", $payload);

        $result = $this->client->updateBoardLabelNameBlue($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardLabelNameGreen()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/labelNames/green", $boardId), "", $payload);

        $result = $this->client->updateBoardLabelNameGreen($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardLabelNameOrange()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/labelNames/orange", $boardId), "", $payload);

        $result = $this->client->updateBoardLabelNameOrange($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardLabelNamePurple()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/labelNames/purple", $boardId), "", $payload);

        $result = $this->client->updateBoardLabelNamePurple($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardLabelNameRed()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/labelNames/red", $boardId), "", $payload);

        $result = $this->client->updateBoardLabelNameRed($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardLabelNameYellow()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/labelNames/yellow", $boardId), "", $payload);

        $result = $this->client->updateBoardLabelNameYellow($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardCustomFields()
    {
        $boardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/customFields", $boardId), "", $payload);

        $result = $this->client->getBoardCustomFields($boardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardLabels()
    {
        $boardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/labels", $boardId), "", $payload);

        $result = $this->client->getBoardLabels($boardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddBoardLabel()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/boards/%s/labels", $boardId), "", $payload);

        $result = $this->client->addBoardLabel($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardLabel()
    {
        $boardId = $this->getTestString();
        $labelId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/labels/%s", $boardId, $labelId), "", $payload);

        $result = $this->client->getBoardLabel($boardId, $labelId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardLists()
    {
        $boardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/lists", $boardId), "", $payload);

        $result = $this->client->getBoardLists($boardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddBoardList()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/boards/%s/lists", $boardId), "", $payload);

        $result = $this->client->addBoardList($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardList()
    {
        $boardId = $this->getTestString();
        $listId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/lists/%s", $boardId, $listId), "", $payload);

        $result = $this->client->getBoardList($boardId, $listId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddBoardMarkAsViewed()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/boards/%s/markAsViewed", $boardId), "", $payload);

        $result = $this->client->addBoardMarkAsViewed($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardMembers()
    {
        $boardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/members", $boardId), "", $payload);

        $result = $this->client->getBoardMembers($boardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardMembers()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/members", $boardId), "", $payload);

        $result = $this->client->updateBoardMembers($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteBoardMember()
    {
        $boardId = $this->getTestString();
        $memberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/boards/%s/members/%s", $boardId, $memberId), "", $payload);

        $result = $this->client->deleteBoardMember($boardId, $memberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardMember()
    {
        $boardId = $this->getTestString();
        $memberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/members/%s", $boardId, $memberId), "", $payload);

        $result = $this->client->getBoardMember($boardId, $memberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardMember()
    {
        $boardId = $this->getTestString();
        $memberId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/members/%s", $boardId, $memberId), "", $payload);

        $result = $this->client->updateBoardMember($boardId, $memberId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardMemberCards()
    {
        $boardId = $this->getTestString();
        $memberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/members/%s/cards", $boardId, $memberId), "", $payload);

        $result = $this->client->getBoardMemberCards($boardId, $memberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardMemberships()
    {
        $boardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/memberships", $boardId), "", $payload);

        $result = $this->client->getBoardMemberships($boardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardMembership()
    {
        $boardId = $this->getTestString();
        $membershipId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/memberships/%s", $boardId, $membershipId), "", $payload);

        $result = $this->client->getBoardMembership($boardId, $membershipId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardMembership()
    {
        $boardId = $this->getTestString();
        $membershipId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/memberships/%s", $boardId, $membershipId), "", $payload);

        $result = $this->client->updateBoardMembership($boardId, $membershipId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardMembersInviteds()
    {
        $boardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/membersInvited", $boardId), "", $payload);

        $result = $this->client->getBoardMembersInviteds($boardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardMembersInvited()
    {
        $boardId = $this->getTestString();
        $membersInvitedId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/membersInvited/%s", $boardId, $membersInvitedId), "", $payload);

        $result = $this->client->getBoardMembersInvited($boardId, $membersInvitedId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardMyPref()
    {
        $boardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/myPrefs", $boardId), "", $payload);

        $result = $this->client->getBoardMyPref($boardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardMyPrefEmailPosition()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/myPrefs/emailPosition", $boardId), "", $payload);

        $result = $this->client->updateBoardMyPrefEmailPosition($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardMyPrefIdEmailList()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/myPrefs/idEmailList", $boardId), "", $payload);

        $result = $this->client->updateBoardMyPrefIdEmailList($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardMyPrefShowListGuide()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/myPrefs/showListGuide", $boardId), "", $payload);

        $result = $this->client->updateBoardMyPrefShowListGuide($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardMyPrefShowSidebar()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/myPrefs/showSidebar", $boardId), "", $payload);

        $result = $this->client->updateBoardMyPrefShowSidebar($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardMyPrefShowSidebarActivity()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/myPrefs/showSidebarActivity", $boardId), "", $payload);

        $result = $this->client->updateBoardMyPrefShowSidebarActivity($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardMyPrefShowSidebarBoardAction()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/myPrefs/showSidebarBoardActions", $boardId), "", $payload);

        $result = $this->client->updateBoardMyPrefShowSidebarBoardAction($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardMyPrefShowSidebarMember()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/myPrefs/showSidebarMembers", $boardId), "", $payload);

        $result = $this->client->updateBoardMyPrefShowSidebarMember($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardName()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/name", $boardId), "", $payload);

        $result = $this->client->updateBoardName($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardOrganization()
    {
        $boardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/organization", $boardId), "", $payload);

        $result = $this->client->getBoardOrganization($boardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetBoardOrganizationField()
    {
        $boardId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/boards/%s/organization/%s", $boardId, $fieldName), "", $payload);

        $result = $this->client->getBoardOrganizationField($boardId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddBoardPowerUp()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/boards/%s/powerUps", $boardId), "", $payload);

        $result = $this->client->addBoardPowerUp($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteBoardPowerUp()
    {
        $boardId = $this->getTestString();
        $powerUpId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/boards/%s/powerUps/%s", $boardId, $powerUpId), "", $payload);

        $result = $this->client->deleteBoardPowerUp($boardId, $powerUpId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardPrefBackground()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/prefs/background", $boardId), "", $payload);

        $result = $this->client->updateBoardPrefBackground($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardPrefCalendarFeedEnabled()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/prefs/calendarFeedEnabled", $boardId), "", $payload);

        $result = $this->client->updateBoardPrefCalendarFeedEnabled($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardPrefCardAging()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/prefs/cardAging", $boardId), "", $payload);

        $result = $this->client->updateBoardPrefCardAging($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardPrefCardCovers()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/prefs/cardCovers", $boardId), "", $payload);

        $result = $this->client->updateBoardPrefCardCovers($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardPrefComment()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/prefs/comments", $boardId), "", $payload);

        $result = $this->client->updateBoardPrefComment($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardPrefInvitation()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/prefs/invitations", $boardId), "", $payload);

        $result = $this->client->updateBoardPrefInvitation($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardPrefPermissionLevel()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/prefs/permissionLevel", $boardId), "", $payload);

        $result = $this->client->updateBoardPrefPermissionLevel($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardPrefSelfJoin()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/prefs/selfJoin", $boardId), "", $payload);

        $result = $this->client->updateBoardPrefSelfJoin($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardPrefVoting()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/prefs/voting", $boardId), "", $payload);

        $result = $this->client->updateBoardPrefVoting($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateBoardSubscribed()
    {
        $boardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/boards/%s/subscribed", $boardId), "", $payload);

        $result = $this->client->updateBoardSubscribed($boardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddCard()
    {
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", "/cards", "", $payload);

        $result = $this->client->addCard($attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteCard()
    {
        $cardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/cards/%s", $cardId), "", $payload);

        $result = $this->client->deleteCard($cardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetCard()
    {
        $cardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/cards/%s", $cardId), "", $payload);

        $result = $this->client->getCard($cardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateCard()
    {
        $cardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/cards/%s", $cardId), "", $payload);

        $result = $this->client->updateCard($cardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetCardField()
    {
        $cardId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/cards/%s/%s", $cardId, $fieldName), "", $payload);

        $result = $this->client->getCardField($cardId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetCardAction()
    {
        $cardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/cards/%s/actions", $cardId), "", $payload);

        $result = $this->client->getCardAction($cardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteCardActionComment()
    {
        $cardId = $this->getTestString();
        $actionId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/cards/%s/actions/%s/comments", $cardId, $actionId), "", $payload);

        $result = $this->client->deleteCardActionComment($cardId, $actionId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateCardActionComments()
    {
        $cardId = $this->getTestString();
        $actionId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/cards/%s/actions/%s/comments", $cardId, $actionId), "", $payload);

        $result = $this->client->updateCardActionComments($cardId, $actionId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddCardActionComment()
    {
        $cardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/cards/%s/actions/comments", $cardId), "", $payload);

        $result = $this->client->addCardActionComment($cardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetCardAttachments()
    {
        $cardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/cards/%s/attachments", $cardId), "", $payload);

        $result = $this->client->getCardAttachments($cardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddCardAttachment()
    {
        $cardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $attributes['file'] = uniqid();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/cards/%s/attachments", $cardId), "", $payload);

        $result = $this->client->addCardAttachment($cardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteCardAttachment()
    {
        $cardId = $this->getTestString();
        $attachmentId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/cards/%s/attachments/%s", $cardId, $attachmentId), "", $payload);

        $result = $this->client->deleteCardAttachment($cardId, $attachmentId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetCardAttachment()
    {
        $cardId = $this->getTestString();
        $attachmentId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/cards/%s/attachments/%s", $cardId, $attachmentId), "", $payload);

        $result = $this->client->getCardAttachment($cardId, $attachmentId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetCardBoard()
    {
        $cardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/cards/%s/board", $cardId), "", $payload);

        $result = $this->client->getCardBoard($cardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetCardBoardField()
    {
        $cardId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/cards/%s/board/%s", $cardId, $fieldName), "", $payload);

        $result = $this->client->getCardBoardField($cardId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetCardCheckItemState()
    {
        $cardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/cards/%s/checkItemStates", $cardId), "", $payload);

        $result = $this->client->getCardCheckItemState($cardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddCardChecklistCheckItem()
    {
        $cardId = $this->getTestString();
        $checklistId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/cards/%s/checklist/%s/checkItem", $cardId, $checklistId), "", $payload);

        $result = $this->client->addCardChecklistCheckItem($cardId, $checklistId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteCardChecklistCheckItem()
    {
        $cardId = $this->getTestString();
        $checklistId = $this->getTestString();
        $checkItemId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/cards/%s/checklist/%s/checkItem/%s", $cardId, $checklistId, $checkItemId), "", $payload);

        $result = $this->client->deleteCardChecklistCheckItem($cardId, $checklistId, $checkItemId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetCardCustomField()
    {
        $cardId = $this->getTestString();
        $customFieldId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/cards/%s/customField/%s", $cardId, $customFieldId), "", $payload);

        $result = $this->client->getCardCustomField($cardId, $customFieldId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateCardCustomField()
    {
        $cardId = $this->getTestString();
        $customFieldId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/cards/%s/customField/%s/item", $cardId, $customFieldId), "", $payload);

        $result = $this->client->updateCardCustomField($cardId, $customFieldId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateCardChecklistCheckItem()
    {
        $cardId = $this->getTestString();
        $checklistId = $this->getTestString();
        $checkItemId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/cards/%s/checklist/%s/checkItem/%s", $cardId, $checklistId, $checkItemId), "", $payload);

        $result = $this->client->updateCardChecklistCheckItem($cardId, $checklistId, $checkItemId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddCardChecklistCheckItemConvertToCard()
    {
        $cardId = $this->getTestString();
        $checklistId = $this->getTestString();
        $checkItemId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/cards/%s/checklist/%s/checkItem/%s/convertToCard", $cardId, $checklistId, $checkItemId), "", $payload);

        $result = $this->client->addCardChecklistCheckItemConvertToCard($cardId, $checklistId, $checkItemId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateCardChecklistCheckItemName()
    {
        $cardId = $this->getTestString();
        $checklistId = $this->getTestString();
        $checkItemId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/cards/%s/checklist/%s/checkItem/%s/name", $cardId, $checklistId, $checkItemId), "", $payload);

        $result = $this->client->updateCardChecklistCheckItemName($cardId, $checklistId, $checkItemId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateCardChecklistCheckItemPos()
    {
        $cardId = $this->getTestString();
        $checklistId = $this->getTestString();
        $checkItemId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/cards/%s/checklist/%s/checkItem/%s/pos", $cardId, $checklistId, $checkItemId), "", $payload);

        $result = $this->client->updateCardChecklistCheckItemPos($cardId, $checklistId, $checkItemId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateCardChecklistCheckItemState()
    {
        $cardId = $this->getTestString();
        $checklistId = $this->getTestString();
        $checkItemId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/cards/%s/checklist/%s/checkItem/%s/state", $cardId, $checklistId, $checkItemId), "", $payload);

        $result = $this->client->updateCardChecklistCheckItemState($cardId, $checklistId, $checkItemId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetCardChecklists()
    {
        $cardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/cards/%s/checklists", $cardId), "", $payload);

        $result = $this->client->getCardChecklists($cardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddCardChecklist()
    {
        $cardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/cards/%s/checklists", $cardId), "", $payload);

        $result = $this->client->addCardChecklist($cardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteCardChecklist()
    {
        $cardId = $this->getTestString();
        $checklistId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/cards/%s/checklists/%s", $cardId, $checklistId), "", $payload);

        $result = $this->client->deleteCardChecklist($cardId, $checklistId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateCardClosed()
    {
        $cardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/cards/%s/closed", $cardId), "", $payload);

        $result = $this->client->updateCardClosed($cardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateCardDesc()
    {
        $cardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/cards/%s/desc", $cardId), "", $payload);

        $result = $this->client->updateCardDesc($cardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateCardDue()
    {
        $cardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/cards/%s/due", $cardId), "", $payload);

        $result = $this->client->updateCardDue($cardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateCardIdAttachmentCover()
    {
        $cardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/cards/%s/idAttachmentCover", $cardId), "", $payload);

        $result = $this->client->updateCardIdAttachmentCover($cardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateCardIdBoard()
    {
        $cardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/cards/%s/idBoard", $cardId), "", $payload);

        $result = $this->client->updateCardIdBoard($cardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddCardIdLabel()
    {
        $cardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/cards/%s/idLabels", $cardId), "", $payload);

        $result = $this->client->addCardIdLabel($cardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteCardIdLabel()
    {
        $cardId = $this->getTestString();
        $idLabelId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/cards/%s/idLabels/%s", $cardId, $idLabelId), "", $payload);

        $result = $this->client->deleteCardIdLabel($cardId, $idLabelId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateCardIdList()
    {
        $cardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/cards/%s/idList", $cardId), "", $payload);

        $result = $this->client->updateCardIdList($cardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddCardIdMember()
    {
        $cardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/cards/%s/idMembers", $cardId), "", $payload);

        $result = $this->client->addCardIdMember($cardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateCardIdMembers()
    {
        $cardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/cards/%s/idMembers", $cardId), "", $payload);

        $result = $this->client->updateCardIdMembers($cardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteCardIdMember()
    {
        $cardId = $this->getTestString();
        $idMemberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/cards/%s/idMembers/%s", $cardId, $idMemberId), "", $payload);

        $result = $this->client->deleteCardIdMember($cardId, $idMemberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddCardLabel()
    {
        $cardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/cards/%s/labels", $cardId), "", $payload);

        $result = $this->client->addCardLabel($cardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateCardLabels()
    {
        $cardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/cards/%s/labels", $cardId), "", $payload);

        $result = $this->client->updateCardLabel($cardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteCardLabel()
    {
        $cardId = $this->getTestString();
        $labelId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/cards/%s/labels/%s", $cardId, $labelId), "", $payload);

        $result = $this->client->deleteCardLabel($cardId, $labelId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetCardList()
    {
        $cardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/cards/%s/list", $cardId), "", $payload);

        $result = $this->client->getCardList($cardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetCardListField()
    {
        $cardId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/cards/%s/list/%s", $cardId, $fieldName), "", $payload);

        $result = $this->client->getCardListField($cardId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddCardMarkAssociatedNotificationsRead()
    {
        $cardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/cards/%s/markAssociatedNotificationsRead", $cardId), "", $payload);

        $result = $this->client->addCardMarkAssociatedNotificationsRead($cardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetCardMembers()
    {
        $cardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/cards/%s/members", $cardId), "", $payload);

        $result = $this->client->getCardMembers($cardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetCardMembersVoted()
    {
        $cardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/cards/%s/membersVoted", $cardId), "", $payload);

        $result = $this->client->getCardMembersVoted($cardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddCardMembersVoted()
    {
        $cardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/cards/%s/membersVoted", $cardId), "", $payload);

        $result = $this->client->addCardMembersVoted($cardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteCardMembersVoted()
    {
        $cardId = $this->getTestString();
        $membersVotedId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/cards/%s/membersVoted/%s", $cardId, $membersVotedId), "", $payload);

        $result = $this->client->deleteCardMembersVoted($cardId, $membersVotedId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateCardName()
    {
        $cardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/cards/%s/name", $cardId), "", $payload);

        $result = $this->client->updateCardName($cardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateCardPos()
    {
        $cardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/cards/%s/pos", $cardId), "", $payload);

        $result = $this->client->updateCardPos($cardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetCardStickers()
    {
        $cardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/cards/%s/stickers", $cardId), "", $payload);

        $result = $this->client->getCardStickers($cardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddCardSticker()
    {
        $cardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/cards/%s/stickers", $cardId), "", $payload);

        $result = $this->client->addCardSticker($cardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteCardSticker()
    {
        $cardId = $this->getTestString();
        $stickerId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/cards/%s/stickers/%s", $cardId, $stickerId), "", $payload);

        $result = $this->client->deleteCardSticker($cardId, $stickerId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetCardSticker()
    {
        $cardId = $this->getTestString();
        $stickerId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/cards/%s/stickers/%s", $cardId, $stickerId), "", $payload);

        $result = $this->client->getCardSticker($cardId, $stickerId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateCardSticker()
    {
        $cardId = $this->getTestString();
        $stickerId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/cards/%s/stickers/%s", $cardId, $stickerId), "", $payload);

        $result = $this->client->updateCardSticker($cardId, $stickerId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateCardSubscribed()
    {
        $cardId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/cards/%s/subscribed", $cardId), "", $payload);

        $result = $this->client->updateCardSubscribed($cardId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddChecklist()
    {
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", "/checklists", "", $payload);

        $result = $this->client->addChecklist($attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteChecklist()
    {
        $checklistId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/checklists/%s", $checklistId), "", $payload);

        $result = $this->client->deleteChecklist($checklistId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetChecklist()
    {
        $checklistId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/checklists/%s", $checklistId), "", $payload);

        $result = $this->client->getChecklist($checklistId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateChecklist()
    {
        $checklistId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/checklists/%s", $checklistId), "", $payload);

        $result = $this->client->updateChecklist($checklistId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetChecklistField()
    {
        $checklistId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/checklists/%s/%s", $checklistId, $fieldName), "", $payload);

        $result = $this->client->getChecklistField($checklistId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetChecklistBoard()
    {
        $checklistId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/checklists/%s/board", $checklistId), "", $payload);

        $result = $this->client->getChecklistBoard($checklistId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetChecklistBoardField()
    {
        $checklistId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/checklists/%s/board/%s", $checklistId, $fieldName), "", $payload);

        $result = $this->client->getChecklistBoardField($checklistId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetChecklistCards()
    {
        $checklistId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/checklists/%s/cards", $checklistId), "", $payload);

        $result = $this->client->getChecklistCards($checklistId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetChecklistCard()
    {
        $checklistId = $this->getTestString();
        $cardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/checklists/%s/cards/%s", $checklistId, $cardId), "", $payload);

        $result = $this->client->getChecklistCard($checklistId, $cardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetChecklistCheckItems()
    {
        $checklistId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/checklists/%s/checkItems", $checklistId), "", $payload);

        $result = $this->client->getChecklistCheckItems($checklistId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddChecklistCheckItem()
    {
        $checklistId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/checklists/%s/checkItems", $checklistId), "", $payload);

        $result = $this->client->addChecklistCheckItem($checklistId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteChecklistCheckItem()
    {
        $checklistId = $this->getTestString();
        $checkItemId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/checklists/%s/checkItems/%s", $checklistId, $checkItemId), "", $payload);

        $result = $this->client->deleteChecklistCheckItem($checklistId, $checkItemId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetChecklistCheckItem()
    {
        $checklistId = $this->getTestString();
        $checkItemId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/checklists/%s/checkItems/%s", $checklistId, $checkItemId), "", $payload);

        $result = $this->client->getChecklistCheckItem($checklistId, $checkItemId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateChecklistIdCard()
    {
        $checklistId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/checklists/%s/idCard", $checklistId), "", $payload);

        $result = $this->client->updateChecklistIdCard($checklistId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateChecklistName()
    {
        $checklistId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/checklists/%s/name", $checklistId), "", $payload);

        $result = $this->client->updateChecklistName($checklistId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateChecklistPos()
    {
        $checklistId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/checklists/%s/pos", $checklistId), "", $payload);

        $result = $this->client->updateChecklistPos($checklistId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddCustomField()
    {
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", "/customFields", "", $payload);

        $result = $this->client->addCustomField($attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddCustomFieldOption()
    {
        $customFieldId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/customField/%s/options", $customFieldId), "", $payload);

        $result = $this->client->addCustomFieldOption($customFieldId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateCustomFieldOption()
    {
        $customFieldId = $this->getTestString();
        $optionId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/customField/%s/options/%s", $customFieldId, $optionId), "", $payload);

        $result = $this->client->updateCustomFieldOption($customFieldId, $optionId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteCustomFieldOption()
    {
        $customFieldId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/customField/%s", $customFieldId), "", $payload);

        $result = $this->client->deleteCustomField($customFieldId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddLabel()
    {
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", "/labels", "", $payload);

        $result = $this->client->addLabel($attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteLabel()
    {
        $labelId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/labels/%s", $labelId), "", $payload);

        $result = $this->client->deleteLabel($labelId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetLabel()
    {
        $labelId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/labels/%s", $labelId), "", $payload);

        $result = $this->client->getLabel($labelId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateLabel()
    {
        $labelId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/labels/%s", $labelId), "", $payload);

        $result = $this->client->updateLabel($labelId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetLabelBoard()
    {
        $labelId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/labels/%s/board", $labelId), "", $payload);

        $result = $this->client->getLabelBoard($labelId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetLabelBoardField()
    {
        $labelId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/labels/%s/board/%s", $labelId, $fieldName), "", $payload);

        $result = $this->client->getLabelBoardField($labelId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateLabelColor()
    {
        $labelId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/labels/%s/color", $labelId), "", $payload);

        $result = $this->client->updateLabelColor($labelId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateLabelName()
    {
        $labelId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/labels/%s/name", $labelId), "", $payload);

        $result = $this->client->updateLabelName($labelId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddList()
    {
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", "/lists", "", $payload);

        $result = $this->client->addList($attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetList()
    {
        $listId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/lists/%s", $listId), "", $payload);

        $result = $this->client->getList($listId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateList()
    {
        $listId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/lists/%s", $listId), "", $payload);

        $result = $this->client->updateList($listId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetListField()
    {
        $listId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/lists/%s/%s", $listId, $fieldName), "", $payload);

        $result = $this->client->getListField($listId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetListActions()
    {
        $listId = $this->getTestString();
        $query = ['entities' => 'true'];
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/lists/%s/actions", $listId), http_build_query($query), $payload);

        $result = $this->client->getListActions($listId, $query);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddListArchiveAllCards()
    {
        $listId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/lists/%s/archiveAllCards", $listId), "", $payload);

        $result = $this->client->addListArchiveAllCards($listId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetListBoard()
    {
        $listId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/lists/%s/board", $listId), "", $payload);

        $result = $this->client->getListBoard($listId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetListBoardField()
    {
        $listId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/lists/%s/board/%s", $listId, $fieldName), "", $payload);

        $result = $this->client->getListBoardField($listId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetListCards()
    {
        $listId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/lists/%s/cards", $listId), "", $payload);

        $result = $this->client->getListCards($listId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddListCard()
    {
        $listId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/lists/%s/cards", $listId), "", $payload);

        $result = $this->client->addListCard($listId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetListCard()
    {
        $listId = $this->getTestString();
        $cardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/lists/%s/cards/%s", $listId, $cardId), "", $payload);

        $result = $this->client->getListCard($listId, $cardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateListClosed()
    {
        $listId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/lists/%s/closed", $listId), "", $payload);

        $result = $this->client->updateListClosed($listId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateListIdBoard()
    {
        $listId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/lists/%s/idBoard", $listId), "", $payload);

        $result = $this->client->updateListIdBoard($listId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddListMoveAllCards()
    {
        $listId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/lists/%s/moveAllCards", $listId), "", $payload);

        $result = $this->client->addListMoveAllCards($listId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateListName()
    {
        $listId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/lists/%s/name", $listId), "", $payload);

        $result = $this->client->updateListName($listId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateListPos()
    {
        $listId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/lists/%s/pos", $listId), "", $payload);

        $result = $this->client->updateListPos($listId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateListSubscribed()
    {
        $listId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/lists/%s/subscribed", $listId), "", $payload);

        $result = $this->client->updateListSubscribed($listId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMember()
    {
        $memberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s", $memberId), "", $payload);

        $result = $this->client->getMember($memberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateMember()
    {
        $memberId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/members/%s", $memberId), "", $payload);

        $result = $this->client->updateMember($memberId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberField()
    {
        $memberId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/%s", $memberId, $fieldName), "", $payload);

        $result = $this->client->getMemberField($memberId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberActions()
    {
        $memberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/actions", $memberId), "", $payload);

        $result = $this->client->getMemberActions($memberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddMemberAvatar()
    {
        $memberId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/members/%s/avatar", $memberId), "", $payload);

        $result = $this->client->addMemberAvatar($memberId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateMemberAvatarSource()
    {
        $memberId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/members/%s/avatarSource", $memberId), "", $payload);

        $result = $this->client->updateMemberAvatarSource($memberId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateMemberBio()
    {
        $memberId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/members/%s/bio", $memberId), "", $payload);

        $result = $this->client->updateMemberBio($memberId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberBoardBackgrounds()
    {
        $memberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/boardBackgrounds", $memberId), "", $payload);

        $result = $this->client->getMemberBoardBackgrounds($memberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddMemberBoardBackground()
    {
        $memberId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/members/%s/boardBackgrounds", $memberId), "", $payload);

        $result = $this->client->addMemberBoardBackground($memberId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteMemberBoardBackground()
    {
        $memberId = $this->getTestString();
        $boardBackgroundId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/members/%s/boardBackgrounds/%s", $memberId, $boardBackgroundId), "", $payload);

        $result = $this->client->deleteMemberBoardBackground($memberId, $boardBackgroundId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberBoardBackground()
    {
        $memberId = $this->getTestString();
        $boardBackgroundId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/boardBackgrounds/%s", $memberId, $boardBackgroundId), "", $payload);

        $result = $this->client->getMemberBoardBackground($memberId, $boardBackgroundId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateMemberBoardBackground()
    {
        $memberId = $this->getTestString();
        $boardBackgroundId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/members/%s/boardBackgrounds/%s", $memberId, $boardBackgroundId), "", $payload);

        $result = $this->client->updateMemberBoardBackground($memberId, $boardBackgroundId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberBoards()
    {
        $memberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/boards", $memberId), "", $payload);

        $result = $this->client->getMemberBoards($memberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberBoard()
    {
        $memberId = $this->getTestString();
        $boardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/boards/%s", $memberId, $boardId), "", $payload);

        $result = $this->client->getMemberBoard($memberId, $boardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberBoardsInvited()
    {
        $memberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/boardsInvited", $memberId), "", $payload);

        $result = $this->client->getMemberBoardsInvited($memberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberBoardsInvitedField()
    {
        $memberId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/boardsInvited/%s", $memberId, $fieldName), "", $payload);

        $result = $this->client->getMemberBoardsInvitedField($memberId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberBoardStars()
    {
        $memberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/boardStars", $memberId), "", $payload);

        $result = $this->client->getMemberBoardStars($memberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddMemberBoardStar()
    {
        $memberId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/members/%s/boardStars", $memberId), "", $payload);

        $result = $this->client->addMemberBoardStar($memberId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteMemberBoardStar()
    {
        $memberId = $this->getTestString();
        $boardStarId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/members/%s/boardStars/%s", $memberId, $boardStarId), "", $payload);

        $result = $this->client->deleteMemberBoardStar($memberId, $boardStarId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberBoardStar()
    {
        $memberId = $this->getTestString();
        $boardStarId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/boardStars/%s", $memberId, $boardStarId), "", $payload);

        $result = $this->client->getMemberBoardStar($memberId, $boardStarId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateMemberBoardStar()
    {
        $memberId = $this->getTestString();
        $boardStarId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/members/%s/boardStars/%s", $memberId, $boardStarId), "", $payload);

        $result = $this->client->updateMemberBoardStar($memberId, $boardStarId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateMemberBoardStarIdBoard()
    {
        $memberId = $this->getTestString();
        $boardStarId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/members/%s/boardStars/%s/idBoard", $memberId, $boardStarId), "", $payload);

        $result = $this->client->updateMemberBoardStarIdBoard($memberId, $boardStarId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateMemberBoardStarPos()
    {
        $memberId = $this->getTestString();
        $boardStarId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/members/%s/boardStars/%s/pos", $memberId, $boardStarId), "", $payload);

        $result = $this->client->updateMemberBoardStarPos($memberId, $boardStarId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberCards()
    {
        $memberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/cards", $memberId), "", $payload);

        $result = $this->client->getMemberCards($memberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberCard()
    {
        $memberId = $this->getTestString();
        $cardId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/cards/%s", $memberId, $cardId), "", $payload);

        $result = $this->client->getMemberCard($memberId, $cardId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberCustomBoardBackgrounds()
    {
        $memberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/customBoardBackgrounds", $memberId), "", $payload);

        $result = $this->client->getMemberCustomBoardBackgrounds($memberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddMemberCustomBoardBackground()
    {
        $memberId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/members/%s/customBoardBackgrounds", $memberId), "", $payload);

        $result = $this->client->addMemberCustomBoardBackground($memberId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteMemberCustomBoardBackground()
    {
        $memberId = $this->getTestString();
        $customBoardBackgroundId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/members/%s/customBoardBackgrounds/%s", $memberId, $customBoardBackgroundId), "", $payload);

        $result = $this->client->deleteMemberCustomBoardBackground($memberId, $customBoardBackgroundId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberCustomBoardBackground()
    {
        $memberId = $this->getTestString();
        $customBoardBackgroundId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/customBoardBackgrounds/%s", $memberId, $customBoardBackgroundId), "", $payload);

        $result = $this->client->getMemberCustomBoardBackground($memberId, $customBoardBackgroundId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateMemberCustomBoardBackground()
    {
        $memberId = $this->getTestString();
        $customBoardBackgroundId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/members/%s/customBoardBackgrounds/%s", $memberId, $customBoardBackgroundId), "", $payload);

        $result = $this->client->updateMemberCustomBoardBackground($memberId, $customBoardBackgroundId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberCustomEmojis()
    {
        $memberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/customEmoji", $memberId), "", $payload);

        $result = $this->client->getMemberCustomEmojis($memberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddMemberCustomEmoji()
    {
        $memberId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/members/%s/customEmoji", $memberId), "", $payload);

        $result = $this->client->addMemberCustomEmoji($memberId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberCustomEmoji()
    {
        $memberId = $this->getTestString();
        $customEmojiId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/customEmoji/%s", $memberId, $customEmojiId), "", $payload);

        $result = $this->client->getMemberCustomEmoji($memberId, $customEmojiId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberCustomStickers()
    {
        $memberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/customStickers", $memberId), "", $payload);

        $result = $this->client->getMemberCustomStickers($memberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddMemberCustomSticker()
    {
        $memberId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/members/%s/customStickers", $memberId), "", $payload);

        $result = $this->client->addMemberCustomSticker($memberId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteMemberCustomSticker()
    {
        $memberId = $this->getTestString();
        $customStickerId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/members/%s/customStickers/%s", $memberId, $customStickerId), "", $payload);

        $result = $this->client->deleteMemberCustomSticker($memberId, $customStickerId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberCustomSticker()
    {
        $memberId = $this->getTestString();
        $customStickerId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/customStickers/%s", $memberId, $customStickerId), "", $payload);

        $result = $this->client->getMemberCustomSticker($memberId, $customStickerId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberDeltas()
    {
        $memberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/deltas", $memberId), "", $payload);

        $result = $this->client->getMemberDeltas($memberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateMemberFullName()
    {
        $memberId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/members/%s/fullName", $memberId), "", $payload);

        $result = $this->client->updateMemberFullName($memberId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateMemberInitials()
    {
        $memberId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/members/%s/initials", $memberId), "", $payload);

        $result = $this->client->updateMemberInitials($memberId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberNotifications()
    {
        $memberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/notifications", $memberId), "", $payload);

        $result = $this->client->getMemberNotifications($memberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberNotification()
    {
        $memberId = $this->getTestString();
        $notificationId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/notifications/%s", $memberId, $notificationId), "", $payload);

        $result = $this->client->getMemberNotification($memberId, $notificationId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddMemberOneTimeMessagesDismissed()
    {
        $memberId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/members/%s/oneTimeMessagesDismissed", $memberId), "", $payload);

        $result = $this->client->addMemberOneTimeMessagesDismissed($memberId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberOrganizations()
    {
        $memberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/organizations", $memberId), "", $payload);

        $result = $this->client->getMemberOrganizations($memberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberOrganization()
    {
        $memberId = $this->getTestString();
        $organizationId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/organizations/%s", $memberId, $organizationId), "", $payload);

        $result = $this->client->getMemberOrganization($memberId, $organizationId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberOrganizationsInvited()
    {
        $memberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/organizationsInvited", $memberId), "", $payload);

        $result = $this->client->getMemberOrganizationsInvited($memberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberOrganizationsInvitedField()
    {
        $memberId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/organizationsInvited/%s", $memberId, $fieldName), "", $payload);

        $result = $this->client->getMemberOrganizationsInvitedField($memberId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateMemberPrefColorBlind()
    {
        $memberId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/members/%s/prefs/colorBlind", $memberId), "", $payload);

        $result = $this->client->updateMemberPrefColorBlind($memberId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateMemberPrefMinutesBetweenSummaries()
    {
        $memberId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/members/%s/prefs/minutesBetweenSummaries", $memberId), "", $payload);

        $result = $this->client->updateMemberPrefMinutesBetweenSummaries($memberId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberSavedSearches()
    {
        $memberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/savedSearches", $memberId), "", $payload);

        $result = $this->client->getMemberSavedSearches($memberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddMemberSavedSearch()
    {
        $memberId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/members/%s/savedSearches", $memberId), "", $payload);

        $result = $this->client->addMemberSavedSearch($memberId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteMemberSavedSearch()
    {
        $memberId = $this->getTestString();
        $savedSearchesId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/members/%s/savedSearches/%s", $memberId, $savedSearchesId), "", $payload);

        $result = $this->client->deleteMemberSavedSearch($memberId, $savedSearchesId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberSavedSearch()
    {
        $memberId = $this->getTestString();
        $savedSearchesId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/savedSearches/%s", $memberId, $savedSearchesId), "", $payload);

        $result = $this->client->getMemberSavedSearch($memberId, $savedSearchesId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateMemberSavedSearch()
    {
        $memberId = $this->getTestString();
        $savedSearchesId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/members/%s/savedSearches/%s", $memberId, $savedSearchesId), "", $payload);

        $result = $this->client->updateMemberSavedSearch($memberId, $savedSearchesId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateMemberSavedSearchName()
    {
        $memberId = $this->getTestString();
        $savedSearchesId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/members/%s/savedSearches/%s/name", $memberId, $savedSearchesId), "", $payload);

        $result = $this->client->updateMemberSavedSearchName($memberId, $savedSearchesId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateMemberSavedSearchPos()
    {
        $memberId = $this->getTestString();
        $savedSearchesId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/members/%s/savedSearches/%s/pos", $memberId, $savedSearchesId), "", $payload);

        $result = $this->client->updateMemberSavedSearchPos($memberId, $savedSearchesId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateMemberSavedSearchQuery()
    {
        $memberId = $this->getTestString();
        $savedSearchesId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/members/%s/savedSearches/%s/query", $memberId, $savedSearchesId), "", $payload);

        $result = $this->client->updateMemberSavedSearchQuery($memberId, $savedSearchesId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetMemberTokens()
    {
        $memberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/members/%s/tokens", $memberId), "", $payload);

        $result = $this->client->getMemberTokens($memberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateMemberUsername()
    {
        $memberId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/members/%s/username", $memberId), "", $payload);

        $result = $this->client->updateMemberUsername($memberId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetNotification()
    {
        $notificationId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/notifications/%s", $notificationId), "", $payload);

        $result = $this->client->getNotification($notificationId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateNotification()
    {
        $notificationId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/notifications/%s", $notificationId), "", $payload);

        $result = $this->client->updateNotification($notificationId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetNotificationField()
    {
        $notificationId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/notifications/%s/%s", $notificationId, $fieldName), "", $payload);

        $result = $this->client->getNotificationField($notificationId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetNotificationBoard()
    {
        $notificationId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/notifications/%s/board", $notificationId), "", $payload);

        $result = $this->client->getNotificationBoard($notificationId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetNotificationBoardField()
    {
        $notificationId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/notifications/%s/board/%s", $notificationId, $fieldName), "", $payload);

        $result = $this->client->getNotificationBoardField($notificationId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetNotificationCard()
    {
        $notificationId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/notifications/%s/card", $notificationId), "", $payload);

        $result = $this->client->getNotificationCard($notificationId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetNotificationCardField()
    {
        $notificationId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/notifications/%s/card/%s", $notificationId, $fieldName), "", $payload);

        $result = $this->client->getNotificationCardField($notificationId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetNotificationEntities()
    {
        $notificationId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/notifications/%s/entities", $notificationId), "", $payload);

        $result = $this->client->getNotificationEntities($notificationId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetNotificationList()
    {
        $notificationId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/notifications/%s/list", $notificationId), "", $payload);

        $result = $this->client->getNotificationList($notificationId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetNotificationListField()
    {
        $notificationId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/notifications/%s/list/%s", $notificationId, $fieldName), "", $payload);

        $result = $this->client->getNotificationListField($notificationId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetNotificationMember()
    {
        $notificationId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/notifications/%s/member", $notificationId), "", $payload);

        $result = $this->client->getNotificationMember($notificationId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetNotificationMemberField()
    {
        $notificationId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/notifications/%s/member/%s", $notificationId, $fieldName), "", $payload);

        $result = $this->client->getNotificationMemberField($notificationId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetNotificationMemberCreator()
    {
        $notificationId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/notifications/%s/memberCreator", $notificationId), "", $payload);

        $result = $this->client->getNotificationMemberCreator($notificationId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetNotificationMemberCreatorField()
    {
        $notificationId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/notifications/%s/memberCreator/%s", $notificationId, $fieldName), "", $payload);

        $result = $this->client->getNotificationMemberCreatorField($notificationId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetNotificationOrganization()
    {
        $notificationId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/notifications/%s/organization", $notificationId), "", $payload);

        $result = $this->client->getNotificationOrganization($notificationId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetNotificationOrganizationField()
    {
        $notificationId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/notifications/%s/organization/%s", $notificationId, $fieldName), "", $payload);

        $result = $this->client->getNotificationOrganizationField($notificationId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateNotificationUnread()
    {
        $notificationId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/notifications/%s/unread", $notificationId), "", $payload);

        $result = $this->client->updateNotificationUnread($notificationId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddNotificationAllRead()
    {
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", "/notifications/all/read", "", $payload);

        $result = $this->client->addNotificationAllRead($attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddOrganization()
    {
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", "/organizations", "", $payload);

        $result = $this->client->addOrganization($attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteOrganization()
    {
        $organizationId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/organizations/%s", $organizationId), "", $payload);

        $result = $this->client->deleteOrganization($organizationId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetOrganization()
    {
        $organizationId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/organizations/%s", $organizationId), "", $payload);

        $result = $this->client->getOrganization($organizationId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateOrganization()
    {
        $organizationId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/organizations/%s", $organizationId), "", $payload);

        $result = $this->client->updateOrganization($organizationId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetOrganizationField()
    {
        $organizationId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/organizations/%s/%s", $organizationId, $fieldName), "", $payload);

        $result = $this->client->getOrganizationField($organizationId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetOrganizationActions()
    {
        $organizationId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/organizations/%s/actions", $organizationId), "", $payload);

        $result = $this->client->getOrganizationActions($organizationId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetOrganizationBoards()
    {
        $organizationId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/organizations/%s/boards", $organizationId), "", $payload);

        $result = $this->client->getOrganizationBoards($organizationId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetOrganizationBoardsFilter()
    {
        $organizationId = $this->getTestString();
        $filter = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/organizations/%s/boards/%s", $organizationId, $filter), "", $payload);

        $result = $this->client->getOrganizationBoardsFilter($organizationId, $filter);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetOrganizationDeltas()
    {
        $organizationId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/organizations/%s/deltas", $organizationId), "", $payload);

        $result = $this->client->getOrganizationDeltas($organizationId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateOrganizationDesc()
    {
        $organizationId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/organizations/%s/desc", $organizationId), "", $payload);

        $result = $this->client->updateOrganizationDesc($organizationId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateOrganizationDisplayName()
    {
        $organizationId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/organizations/%s/displayName", $organizationId), "", $payload);

        $result = $this->client->updateOrganizationDisplayName($organizationId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteOrganizationLogo()
    {
        $organizationId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/organizations/%s/logo", $organizationId), "", $payload);

        $result = $this->client->deleteOrganizationLogo($organizationId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddOrganizationLogo()
    {
        $organizationId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/organizations/%s/logo", $organizationId), "", $payload);

        $result = $this->client->addOrganizationLogo($organizationId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetOrganizationMembers()
    {
        $organizationId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/organizations/%s/members", $organizationId), "", $payload);

        $result = $this->client->getOrganizationMembers($organizationId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateOrganizationMembers()
    {
        $organizationId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/organizations/%s/members", $organizationId), "", $payload);

        $result = $this->client->updateOrganizationMembers($organizationId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteOrganizationMember()
    {
        $organizationId = $this->getTestString();
        $memberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/organizations/%s/members/%s", $organizationId, $memberId), "", $payload);

        $result = $this->client->deleteOrganizationMember($organizationId, $memberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetOrganizationMembersFilter()
    {
        $organizationId = $this->getTestString();
        $filter = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/organizations/%s/members/%s", $organizationId, $filter), "", $payload);

        $result = $this->client->getOrganizationMembersFilter($organizationId, $filter);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateOrganizationMember()
    {
        $organizationId = $this->getTestString();
        $memberId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/organizations/%s/members/%s", $organizationId, $memberId), "", $payload);

        $result = $this->client->updateOrganizationMember($organizationId, $memberId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteOrganizationMemberAll()
    {
        $organizationId = $this->getTestString();
        $memberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/organizations/%s/members/%s/all", $organizationId, $memberId), "", $payload);

        $result = $this->client->deleteOrganizationMemberAll($organizationId, $memberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetOrganizationMemberCards()
    {
        $organizationId = $this->getTestString();
        $memberId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/organizations/%s/members/%s/cards", $organizationId, $memberId), "", $payload);

        $result = $this->client->getOrganizationMemberCards($organizationId, $memberId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateOrganizationMemberDeactivated()
    {
        $organizationId = $this->getTestString();
        $memberId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/organizations/%s/members/%s/deactivated", $organizationId, $memberId), "", $payload);

        $result = $this->client->updateOrganizationMemberDeactivated($organizationId, $memberId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetOrganizationMemberships()
    {
        $organizationId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/organizations/%s/memberships", $organizationId), "", $payload);

        $result = $this->client->getOrganizationMemberships($organizationId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetOrganizationMembership()
    {
        $organizationId = $this->getTestString();
        $membershipId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/organizations/%s/memberships/%s", $organizationId, $membershipId), "", $payload);

        $result = $this->client->getOrganizationMembership($organizationId, $membershipId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateOrganizationMembership()
    {
        $organizationId = $this->getTestString();
        $membershipId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/organizations/%s/memberships/%s", $organizationId, $membershipId), "", $payload);

        $result = $this->client->updateOrganizationMembership($organizationId, $membershipId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetOrganizationMembersInvited()
    {
        $organizationId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/organizations/%s/membersInvited", $organizationId), "", $payload);

        $result = $this->client->getOrganizationMembersInvited($organizationId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetOrganizationMembersInvitedField()
    {
        $organizationId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/organizations/%s/membersInvited/%s", $organizationId, $fieldName), "", $payload);

        $result = $this->client->getOrganizationMembersInvitedField($organizationId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateOrganizationName()
    {
        $organizationId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/organizations/%s/name", $organizationId), "", $payload);

        $result = $this->client->updateOrganizationName($organizationId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteOrganizationPrefAssociatedDomain()
    {
        $organizationId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/organizations/%s/prefs/associatedDomain", $organizationId), "", $payload);

        $result = $this->client->deleteOrganizationPrefAssociatedDomain($organizationId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateOrganizationPrefAssociatedDomain()
    {
        $organizationId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/organizations/%s/prefs/associatedDomain", $organizationId), "", $payload);

        $result = $this->client->updateOrganizationPrefAssociatedDomain($organizationId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateOrganizationPrefBoardVisibilityRestrictOrg()
    {
        $organizationId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/organizations/%s/prefs/boardVisibilityRestrict/org", $organizationId), "", $payload);

        $result = $this->client->updateOrganizationPrefBoardVisibilityRestrictOrg($organizationId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateOrganizationPrefBoardVisibilityRestrictPrivate()
    {
        $organizationId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/organizations/%s/prefs/boardVisibilityRestrict/private", $organizationId), "", $payload);

        $result = $this->client->updateOrganizationPrefBoardVisibilityRestrictPrivate($organizationId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateOrganizationPrefBoardVisibilityRestrictPublic()
    {
        $organizationId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/organizations/%s/prefs/boardVisibilityRestrict/public", $organizationId), "", $payload);

        $result = $this->client->updateOrganizationPrefBoardVisibilityRestrictPublic($organizationId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateOrganizationPrefExternalMembersDisabled()
    {
        $organizationId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/organizations/%s/prefs/externalMembersDisabled", $organizationId), "", $payload);

        $result = $this->client->updateOrganizationPrefExternalMembersDisabled($organizationId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateOrganizationPrefGoogleAppsVersion()
    {
        $organizationId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/organizations/%s/prefs/googleAppsVersion", $organizationId), "", $payload);

        $result = $this->client->updateOrganizationPrefGoogleAppsVersion($organizationId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteOrganizationPrefOrgInviteRestrict()
    {
        $organizationId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/organizations/%s/prefs/orgInviteRestrict", $organizationId), "", $payload);

        $result = $this->client->deleteOrganizationPrefOrgInviteRestrict($organizationId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateOrganizationPrefOrgInviteRestrict()
    {
        $organizationId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/organizations/%s/prefs/orgInviteRestrict", $organizationId), "", $payload);

        $result = $this->client->updateOrganizationPrefOrgInviteRestrict($organizationId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateOrganizationPrefPermissionLevel()
    {
        $organizationId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/organizations/%s/prefs/permissionLevel", $organizationId), "", $payload);

        $result = $this->client->updateOrganizationPrefPermissionLevel($organizationId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateOrganizationWebsite()
    {
        $organizationId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/organizations/%s/website", $organizationId), "", $payload);

        $result = $this->client->updateOrganizationWebsite($organizationId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetSearch()
    {
        $payload = $this->getSuccessPayload();
        $attributes = $this->getTestAttributes();
        $this->prepareFor("GET", "/search", http_build_query($attributes), $payload);

        $result = $this->client->getSearch($attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetSearchMembers()
    {
        $payload = $this->getSuccessPayload();
        $attributes = $this->getTestAttributes();
        $this->prepareFor("GET", "/search/members", http_build_query($attributes), $payload);

        $result = $this->client->getSearchMembers($attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddSession()
    {
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", "/sessions", "", $payload);

        $result = $this->client->addSession($attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateSession()
    {
        $sessionId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/sessions/%s", $sessionId), "", $payload);

        $result = $this->client->updateSession($sessionId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateSessionStatus()
    {
        $sessionId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/sessions/%s/status", $sessionId), "", $payload);

        $result = $this->client->updateSessionStatus($sessionId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetSessionSocket()
    {
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", "/sessions/socket", "", $payload);

        $result = $this->client->getSessionSocket();

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteToken()
    {
        $tokenId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/tokens/%s", $tokenId), "", $payload);

        $result = $this->client->deleteToken($tokenId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetToken()
    {
        $tokenId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/tokens/%s", $tokenId), "", $payload);

        $result = $this->client->getToken($tokenId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetTokenField()
    {
        $tokenId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/tokens/%s/%s", $tokenId, $fieldName), "", $payload);

        $result = $this->client->getTokenField($tokenId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetTokenMember()
    {
        $tokenId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/tokens/%s/member", $tokenId), "", $payload);

        $result = $this->client->getTokenMember($tokenId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetTokenMemberField()
    {
        $tokenId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/tokens/%s/member/%s", $tokenId, $fieldName), "", $payload);

        $result = $this->client->getTokenMemberField($tokenId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetTokenWebhooks()
    {
        $tokenId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/tokens/%s/webhooks", $tokenId), "", $payload);

        $result = $this->client->getTokenWebhooks($tokenId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddTokenWebhook()
    {
        $tokenId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", sprintf("/tokens/%s/webhooks", $tokenId), "", $payload);

        $result = $this->client->addTokenWebhook($tokenId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateTokenWebhooks()
    {
        $tokenId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/tokens/%s/webhooks", $tokenId), "", $payload);

        $result = $this->client->updateTokenWebhooks($tokenId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteTokenWebhook()
    {
        $tokenId = $this->getTestString();
        $webhookId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/tokens/%s/webhooks/%s", $tokenId, $webhookId), "", $payload);

        $result = $this->client->deleteTokenWebhook($tokenId, $webhookId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetTokenWebhook()
    {
        $tokenId = $this->getTestString();
        $webhookId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/tokens/%s/webhooks/%s", $tokenId, $webhookId), "", $payload);

        $result = $this->client->getTokenWebhook($tokenId, $webhookId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetType()
    {
        $typeId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/types/%s", $typeId), "", $payload);

        $result = $this->client->getType($typeId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testAddWebhook()
    {
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("POST", "/webhooks", "", $payload);

        $result = $this->client->addWebhook($attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testDeleteWebhook()
    {
        $webhookId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("DELETE", sprintf("/webhooks/%s", $webhookId), "", $payload);

        $result = $this->client->deleteWebhook($webhookId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetWebhook()
    {
        $webhookId = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/webhooks/%s", $webhookId), "", $payload);

        $result = $this->client->getWebhook($webhookId);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateWebhook()
    {
        $webhookId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/webhooks/%s", $webhookId), "", $payload);

        $result = $this->client->updateWebhook($webhookId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testGetWebhookField()
    {
        $webhookId = $this->getTestString();
        $fieldName = $this->getTestString();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("GET", sprintf("/webhooks/%s/%s", $webhookId, $fieldName), "", $payload);

        $result = $this->client->getWebhookField($webhookId, $fieldName);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateWebhookActive()
    {
        $webhookId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/webhooks/%s/active", $webhookId), "", $payload);

        $result = $this->client->updateWebhookActive($webhookId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateWebhookCallbackURL()
    {
        $webhookId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/webhooks/%s/callbackURL", $webhookId), "", $payload);

        $result = $this->client->updateWebhookCallbackURL($webhookId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateWebhookDescription()
    {
        $webhookId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/webhooks/%s/description", $webhookId), "", $payload);

        $result = $this->client->updateWebhookDescription($webhookId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }

    public function testUpdateWebhookIdModel()
    {
        $webhookId = $this->getTestString();
        $attributes = $this->getTestAttributes();
        $payload = $this->getSuccessPayload();
        $this->prepareFor("PUT", sprintf("/webhooks/%s/idModel", $webhookId), "", $payload);

        $result = $this->client->updateWebhookIdModel($webhookId, $attributes);

        $this->assertExpectedEqualsResult($payload, $result);
    }
}
