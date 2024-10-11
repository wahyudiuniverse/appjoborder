import { expect } from 'chai';
// eslint-disable-next-line import/no-named-default
import { default as _templates } from '../../src/scripts/templates';
import { strToEl, getClassNames } from '../../src/scripts/lib/utils';
import { DEFAULT_CLASSNAMES, DEFAULT_CONFIG, Options, ClassNames } from '../../src';
import { NoticeTypes, Templates as TemplatesInterface } from '../../src/scripts/interfaces/templates';

/**
 * @param {HTMLElement} element1
 * @param {HTMLElement} element2
 */
function expectEqualElements(element1, element2): void {
  expect(element1.tagName).to.equal(element2.tagName);
  expect(Object.keys(element1.dataset)).to.have.members(Object.keys(element2.dataset));
  expect(element1.classList).to.include(element2.classList);
  // compare attributes values
  for (const attribute of Object.values(element1.attributes)) {
    expect(element1.getAttribute(attribute)).to.equal(element2.getAttribute(attribute));
  }
  expect(element1.attributes.length).to.equal(element2.attributes.length);
}

function createOptionsWithPartialClasses(classNames: Partial<ClassNames>, options: Partial<Options> = {}): Options {
  return {
    ...DEFAULT_CONFIG,
    ...options,
    classNames: {
      ...DEFAULT_CLASSNAMES,
      ...classNames,
    },
  };
}

function shimTemplates(element: string): TemplatesInterface {
  const fauxChoices = {
    _docRoot: document.createElement('body'),
    passedElement: {
      element: document.createElement(element),
    },
  };

  const templating = {};
  Object.keys(_templates).forEach((name) => {
    templating[name] = _templates[name].bind(fauxChoices);
  });

  return templating as TemplatesInterface;
}

describe('templates', () => {
  describe('containerOuter', () => {
    const options = createOptionsWithPartialClasses({
      containerOuter: 'class-1',
    });
    const direction = 'rtl';

    describe('select element', () => {
      const templates = shimTemplates('select');
      describe('search enabled', () => {
        it('returns expected html', () => {
          const isSelectElement = true;
          const isSelectOneElement = false;
          const searchEnabled = true;
          const passedElementType = 'select-multiple';
          const labelId = '';

          const expectedOutput = strToEl(`
            <div
              class="${getClassNames(options.classNames.containerOuter).join(' ')}"
              data-type="${passedElementType}"
              role="combobox"
              aria-autocomplete="list"
              aria-haspopup="true"
              aria-expanded="false"
              dir="${direction}"
              >
            </div>
          `);
          const actualOutput = templates.containerOuter(
            options,
            direction,
            isSelectElement,
            isSelectOneElement,
            searchEnabled,
            passedElementType,
            labelId,
          );
          expectEqualElements(actualOutput, expectedOutput);
        });
      });

      describe('with label id for a11y', () => {
        it('returns expected html', () => {
          const isSelectElement = true;
          const isSelectOneElement = true;
          const searchEnabled = false;
          const passedElementType = 'select-one';
          const labelId = 'testLabelId';

          const expectedOutput = strToEl(`
            <div
              class="${options.classNames.containerOuter}"
              data-type="${passedElementType}"
              role="listbox"
              tabindex="0"
              aria-haspopup="true"
              aria-expanded="false"
              aria-labelledby="${labelId}"
              dir="${direction}"
              >
            </div>
          `);
          const actualOutput = templates.containerOuter(
            options,
            direction,
            isSelectElement,
            isSelectOneElement,
            searchEnabled,
            passedElementType,
            labelId,
          );
          expectEqualElements(actualOutput, expectedOutput);
        });
      });

      describe('search disabled', () => {
        it('returns expected html', () => {
          const isSelectElement = true;
          const isSelectOneElement = false;
          const searchEnabled = false;
          const passedElementType = 'select-multiple';
          const labelId = '';

          const expectedOutput = strToEl(`
            <div
              class="${getClassNames(options.classNames.containerOuter).join(' ')}"
              data-type="${passedElementType}"
              role="listbox"
              aria-haspopup="true"
              aria-expanded="false"
              dir="${direction}"
              >
            </div>
          `);
          const actualOutput = templates.containerOuter(
            options,
            direction,
            isSelectElement,
            isSelectOneElement,
            searchEnabled,
            passedElementType,
            labelId,
          );

          expectEqualElements(actualOutput, expectedOutput);
        });
      });

      describe('select one element', () => {
        it('returns expected html', () => {
          const isSelectElement = true;
          const isSelectOneElement = true;
          const searchEnabled = false;
          const passedElementType = 'select-one';
          const labelId = '';

          const expectedOutput = strToEl(`
            <div
              class="${getClassNames(options.classNames.containerOuter).join(' ')}"
              data-type="${passedElementType}"
              role="listbox"
              tabindex="0"
              aria-haspopup="true"
              aria-expanded="false"
              dir="${direction}"
              >
            </div>
          `);
          const actualOutput = templates.containerOuter(
            options,
            direction,
            isSelectElement,
            isSelectOneElement,
            searchEnabled,
            passedElementType,
            labelId,
          );

          expectEqualElements(actualOutput, expectedOutput);
        });
      });
    });

    describe('non select element', () => {
      const templates = shimTemplates('input');
      it('returns expected html', () => {
        const isSelectElement = false;
        const isSelectOneElement = false;
        const searchEnabled = false;
        const passedElementType = 'text';
        const labelId = '';

        const expectedOutput = strToEl(`
          <div
            class="${getClassNames(options.classNames.containerOuter).join(' ')}"
            data-type="${passedElementType}"
            dir="${direction}"
            >
          </div>
        `);
        const actualOutput = templates.containerOuter(
          options,
          direction,
          isSelectElement,
          isSelectOneElement,
          searchEnabled,
          passedElementType,
          labelId,
        );

        expectEqualElements(actualOutput, expectedOutput);
      });
    });
  });

  describe('containerInner', () => {
    const templates = shimTemplates('select');
    it('returns expected html', () => {
      const innerOptions = createOptionsWithPartialClasses({
        containerInner: 'class-1',
      });
      const expectedOutput = strToEl(
        `<div class="${getClassNames(innerOptions.classNames.containerInner).join(' ')}"></div>`,
      );
      const actualOutput = templates.containerInner(innerOptions);

      expectEqualElements(actualOutput, expectedOutput);
    });
  });

  describe('itemList', () => {
    const templates = shimTemplates('select');
    const itemOptions = createOptionsWithPartialClasses({
      list: 'class-1',
      listSingle: 'class-2',
      listItems: 'class-3',
    });

    describe('select one element', () => {
      it('returns expected html', () => {
        const expectedOutput = strToEl(
          `<div class="${getClassNames(itemOptions.classNames.list).join(' ')} ${getClassNames(itemOptions.classNames.listSingle).join(' ')}"></div>`,
        );
        const actualOutput = templates.itemList(itemOptions, true);

        expectEqualElements(actualOutput, expectedOutput);
      });
    });

    describe('non select one element', () => {
      it('returns expected html', () => {
        const expectedOutput = strToEl(
          `<div class="${getClassNames(itemOptions.classNames.list).join(' ')} ${getClassNames(itemOptions.classNames.listItems).join(' ')}"></div>`,
        );
        const actualOutput = templates.itemList(itemOptions, false);

        expectEqualElements(actualOutput, expectedOutput);
      });
    });
  });

  describe('placeholder', () => {
    const templates = shimTemplates('select');
    it('returns expected html', () => {
      const placeholderOptions = createOptionsWithPartialClasses({
        placeholder: 'class-1',
      });
      const value = 'test';
      const expectedOutput = strToEl(`
        <div class="${getClassNames(placeholderOptions.classNames.placeholder).join(' ')}">${value}</div>`);
      const actualOutput = templates.placeholder(placeholderOptions, value);

      expectEqualElements(actualOutput, expectedOutput);
    });
  });

  describe('choiceList', () => {
    const choiceListOptions = createOptionsWithPartialClasses({
      list: 'class-1',
    });

    describe('select one element', () => {
      const templates = shimTemplates('select');
      it('returns expected html', () => {
        const expectedOutput = strToEl(`
          <div
            class="${getClassNames(choiceListOptions.classNames.list).join(' ')}"
            role="listbox"
            >
          </div>
        `);
        const actualOutput = templates.choiceList(choiceListOptions, true);

        expectEqualElements(actualOutput, expectedOutput);
      });
    });

    describe('non select one element', () => {
      const templates = shimTemplates('input');
      it('returns expected html', () => {
        const expectedOutput = strToEl(`
          <div
            class="${getClassNames(choiceListOptions.classNames.list).join(' ')}"
            role="listbox"
            aria-multiselectable="true"
            >
          </div>
        `);
        const actualOutput = templates.choiceList(choiceListOptions, false);

        expectEqualElements(actualOutput, expectedOutput);
      });
    });
  });

  describe('choiceGroup', () => {
    const templates = shimTemplates('select');
    const groupOptions = createOptionsWithPartialClasses({
      group: 'class-1',
      groupHeading: 'class-2',
      itemDisabled: 'class-3',
    });

    let data;

    beforeEach(() => {
      data = {
        id: 1,
        value: 'test',
        disabled: false,
      };
    });

    describe('enabled state', () => {
      it('returns expected html', () => {
        const expectedOutput = strToEl(`
          <div
          class="${getClassNames(groupOptions.classNames.group).join(' ')}"
            data-group
            data-id="${data.id}"
            data-value="${data.value}"
            role="group"
            >
            <div class="${getClassNames(groupOptions.classNames.groupHeading).join(' ')}">${data.value}</div>
          </div>
        `);
        const actualOutput = templates.choiceGroup(groupOptions, data);

        expectEqualElements(actualOutput, expectedOutput);
      });
    });

    describe('disabled state', () => {
      beforeEach(() => {
        data = {
          ...data,
          disabled: true,
        };
      });

      it('returns expected html', () => {
        const expectedOutput = strToEl(`
          <div
            class="${getClassNames(groupOptions.classNames.group).join(' ')} ${getClassNames(groupOptions.classNames.itemDisabled).join(' ')}"
            data-group
            data-id="${data.id}"
            data-value="${data.value}"
            role="group"
            aria-disabled="true"
            >
            <div class="${getClassNames(groupOptions.classNames.groupHeading).join(' ')}">${data.value}</div>
          </div>
        `);
        const actualOutput = templates.choiceGroup(groupOptions, data);

        expectEqualElements(actualOutput, expectedOutput);
      });
    });
  });

  describe('choice', () => {
    const templates = shimTemplates('select');
    const choiceOptions = createOptionsWithPartialClasses({
      item: 'class-1',
      itemChoice: 'class-2',
      itemDisabled: 'class-3',
      itemSelectable: 'class-4',
      placeholder: 'class-5',
      selectedState: 'class-6',
    });

    const itemSelectText = 'test 6';

    let data;

    beforeEach(() => {
      data = {
        id: 1,
        group: null,
        disabled: false,
        elementId: 'test',
        label: 'test',
        value: 'test',
        selected: false,
      };
    });

    describe('enabled state', () => {
      it('returns expected html', () => {
        const expectedOutput = strToEl(`
          <div
            class="${getClassNames(choiceOptions.classNames.item).join(' ')} ${getClassNames(
              choiceOptions.classNames.itemChoice,
            ).join(' ')} ${getClassNames(choiceOptions.classNames.itemSelectable).join(' ')}"
            data-select-text="${itemSelectText}"
            data-choice
            data-id="${data.id}"
            data-value="${data.value}"
            data-choice-selectable
            id="${data.elementId}"
            role="option"
            >
            ${data.label}
          </div>
        `);
        const actualOutput = templates.choice(choiceOptions, data, itemSelectText);

        expectEqualElements(actualOutput, expectedOutput);
      });
    });

    describe('disabled state', () => {
      beforeEach(() => {
        data = {
          ...data,
          disabled: true,
        };
      });

      it('returns expected html', () => {
        const expectedOutput = strToEl(`
          <div
            class="${getClassNames(choiceOptions.classNames.item).join(' ')} ${getClassNames(
              choiceOptions.classNames.itemChoice,
            ).join(' ')} ${getClassNames(choiceOptions.classNames.itemDisabled).join(' ')}"
            data-select-text="${itemSelectText}"
            data-choice
            data-id="${data.id}"
            data-value="${data.value}"
            data-choice-disabled
            aria-disabled="true"
            id="${data.elementId}"
            role="option"
            >
            ${data.label}
          </div>
        `);
        const actualOutput = templates.choice(choiceOptions, data, itemSelectText);

        expectEqualElements(actualOutput, expectedOutput);
      });
    });

    describe('selected state', () => {
      beforeEach(() => {
        data = {
          ...data,
          selected: true,
        };
      });

      it('returns expected html', () => {
        const expectedOutput = strToEl(`
          <div
            class="${getClassNames(choiceOptions.classNames.item).join(' ')} ${getClassNames(
              choiceOptions.classNames.itemChoice,
            ).join(
              ' ',
            )} ${choiceOptions.classNames.selectedState} ${getClassNames(choiceOptions.classNames.itemSelectable).join(' ')}"
            data-select-text="${itemSelectText}"
            data-choice
            data-id="${data.id}"
            data-value="${data.value}"
            data-choice-selectable
            id="${data.elementId}"
            role="option"
            >
            ${data.label}
          </div>
        `);
        const actualOutput = templates.choice(choiceOptions, data, itemSelectText);

        expectEqualElements(actualOutput, expectedOutput);
      });
    });

    describe('placeholder', () => {
      beforeEach(() => {
        data = {
          ...data,
          placeholder: true,
        };
      });

      it('returns expected html', () => {
        const expectedOutput = strToEl(`
          <div
            class="${getClassNames(choiceOptions.classNames.item).join(' ')} ${getClassNames(
              choiceOptions.classNames.itemChoice,
            ).join(
              ' ',
            )} ${choiceOptions.classNames.placeholder} ${getClassNames(choiceOptions.classNames.itemSelectable).join(' ')}"
            data-select-text="${itemSelectText}"
            data-choice
            data-id="${data.id}"
            data-value="${data.value}"
            data-choice-selectable
            id="${data.elementId}"
            role="option"
            >
            ${data.label}
          </div>
        `);
        const actualOutput = templates.choice(choiceOptions, data, itemSelectText);

        expectEqualElements(actualOutput, expectedOutput);
      });
    });

    describe('child of group', () => {
      beforeEach(() => {
        data = {
          ...data,
          group: { id: 1, label: 'test' },
        };
      });

      it('returns expected html', () => {
        const expectedOutput = strToEl(`
          <div
            class="${getClassNames(choiceOptions.classNames.item).join(' ')} ${getClassNames(
              choiceOptions.classNames.itemChoice,
            ).join(' ')} ${getClassNames(choiceOptions.classNames.itemSelectable).join(' ')}"
            data-select-text="${itemSelectText}"
            data-choice
            data-id="${data.id}"
            data-value="${data.value}"
            data-group-id="${data.groupId}"
            data-choice-selectable
            id="${data.elementId}"
            role="treeitem"
            >
            ${data.label}
          </div>
        `);
        const actualOutput = templates.choice(choiceOptions, data, itemSelectText, 'Group text');

        expectEqualElements(actualOutput, expectedOutput);
      });
    });
  });

  describe('input', () => {
    const templates = shimTemplates('input');
    const inputOptions = createOptionsWithPartialClasses({
      input: 'class-1',
      inputCloned: 'class-2',
    });

    it('returns expected html', () => {
      /*
        Following attributes are not supported by JSDOM, so, can't compare
          autocapitalize="off"
          spellcheck="false"
      */
      const expectedOutput = strToEl(`
        <input
          type="search"
          class="${getClassNames(inputOptions.classNames.input).join(' ')} ${getClassNames(inputOptions.classNames.inputCloned).join(' ')}"
          autocomplete="off"
          role="textbox"
          aria-autocomplete="list"
          aria-label="test placeholder"
        >
      `);
      const actualOutput = templates.input(inputOptions, 'test placeholder');

      expectEqualElements(actualOutput, expectedOutput);
    });
  });

  describe('dropdown', () => {
    const templates = shimTemplates('select');
    const dropdownOptions = createOptionsWithPartialClasses({
      list: 'class-1',
      listDropdown: 'class-2',
    });

    it('returns expected html', () => {
      const expectedOutput = strToEl(
        `<div class="${getClassNames(dropdownOptions.classNames.list).join(' ')} ${getClassNames(dropdownOptions.classNames.listDropdown).join(' ')}" aria-expanded="false"></div>`,
      );
      const actualOutput = templates.dropdown(dropdownOptions);

      expectEqualElements(actualOutput, expectedOutput);
    });
  });

  describe('notice', () => {
    const templates = shimTemplates('select');
    const noticeOptions = createOptionsWithPartialClasses({
      item: 'class-1',
      itemChoice: 'class-2',
      noResults: 'class-3',
      noChoices: 'class-4',
    });

    const label = 'test';

    it('returns expected html', () => {
      const expectedOutput = strToEl(`
        <div class="${getClassNames(noticeOptions.classNames.item).join(' ')} ${getClassNames(noticeOptions.classNames.itemChoice).join(' ')}">
          ${label}
        </div>
      `);
      const actualOutput = templates.notice(noticeOptions, label, '');

      expectEqualElements(actualOutput, expectedOutput);
    });

    describe('passing a notice type', () => {
      describe('no results', () => {
        it('adds no results classname', () => {
          const { item, itemChoice, notice, noResults } = noticeOptions.classNames;
          const expectedOutput = strToEl(`
            <div class="${getClassNames(item).join(' ')} ${getClassNames(itemChoice).join(' ')} ${getClassNames(notice).join(' ')} ${getClassNames(noResults).join(' ')}">
              ${label}
            </div>
          `);
          const actualOutput = templates.notice(noticeOptions, label, NoticeTypes.noResults);

          expectEqualElements(actualOutput, expectedOutput);
        });
      });

      describe('no choices', () => {
        it('adds no choices classname', () => {
          const { item, itemChoice, notice, noChoices } = noticeOptions.classNames;
          const expectedOutput = strToEl(`
            <div class="${getClassNames(item).join(' ')} ${getClassNames(itemChoice).join(' ')} ${getClassNames(notice).join(' ')} ${getClassNames(noChoices).join(' ')}">
              ${label}
            </div>
          `);
          const actualOutput = templates.notice(noticeOptions, label, NoticeTypes.noChoices);

          expectEqualElements(actualOutput, expectedOutput);
        });
      });
    });
  });

  describe('option', () => {
    const templates = shimTemplates('select');
    let data;

    beforeEach(() => {
      data = {
        disabled: false,
        selected: false,
        value: 'test value',
        label: 'test label',
      };
    });

    it('returns expected html', () => {
      const expectedOutput = strToEl(
        `<option value="${data.value}" ${data.selected ? 'selected' : ''} ${data.disabled ? 'disabled' : ''}>${data.label}</option>`,
      );
      const actualOutput = templates.option(data);

      expectEqualElements(actualOutput, expectedOutput);
    });

    describe('when selected', () => {
      beforeEach(() => {
        data = {
          ...data,
          selected: true,
        };
      });

      it('sets selected attr to true', () => {
        const output = templates.option(data);
        expect(output.selected).to.equal(true);
      });
    });

    describe('when disabled', () => {
      beforeEach(() => {
        data = {
          ...data,
          disabled: true,
        };
      });

      it('sets disabled attr to true', () => {
        const output = templates.option(data);
        expect(output.disabled).to.equal(true);
      });
    });
  });
});
