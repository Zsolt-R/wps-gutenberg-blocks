const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks
const { InspectorControls, RichText } = wp.editor;
const { PanelBody, SelectControl } = wp.components;
const handleClick = (e) => {
    console.log(e);
};

registerBlockType('customBlock/wtx-button', {
    title: __('WTX Button'),
    icon: 'shield',
    category: 'common',
    keywords: [
        __('wtx'),
        __('Button'),
    ],
    attributes: {
        color: {
            type: 'string',
            source: 'attribute',
            attribute: 'data-color',
            selector: 'button',
            default: 'blue',
        },
        align: {
            type: 'string',
            source: 'attribute',
            attribute: 'data-align',
            selector: 'button',
            default: 'left',
        },
        label: {
            type: 'html',
            source: 'text',
            selector: 'button',
            default: 'Button label',
        },
    },
    edit: function ({ attributes, setAttributes, className }) {
        const classNames = 'wtx-button__color--' + attributes.color +
            ' wtx-button__orientation--' + attributes.align;
        return (
            <div className={className}>
                {
                    <InspectorControls>
                        <PanelBody>
                            <SelectControl label={__('Color')}
                                value={attributes.color}
                                onChange={color => setAttributes({ color })}
                                options={[
                                    { value: 'blue', label: __('Blue') },
                                    { value: 'white', label: __('White') },
                                ]} />
                            <SelectControl label={__('Orientation')}
                                value={attributes.align}
                                onChange={align => setAttributes({ align })}
                                options={[
                                    { value: 'left', label: __('Left') },
                                    { value: 'center', label: __('Center') },
                                    { value: 'right', label: __('Right') },
                                ]} />
                            <div>
                                <p
                                    className={'wtx-button__atts--label'}>{__('Label')}</p>
                                <RichText
                                    tagName="p"
                                    className={'wtx-button__atts--input'}
                                    value={attributes.label}
                                    onChange={(label) => setAttributes({ label })}
                                    placeholder={__('Button label', 'custom-block')}
                                    keepPlaceholderOnFocus={true}
                                />
                            </div>
                        </PanelBody>
                    </InspectorControls>
                }
                <div className={'wtx-button'}>
                    <div className={'wtx-button--wrapper ' + classNames}>
                        <button onClick={handleClick}
                            data-color={attributes.color}
                            data-align={attributes.align}>{attributes.label}</button>
                    </div>
                </div>
            </div>
        );
    },
    save({ attributes }) {
        const classNames = 'wtx-button--wrapper wtx-button__color--' +
            attributes.color +
            ' wtx-button__align--' + attributes.align;
        return (
            <div className={'wtx-button'}>
                <div className={classNames}>
                    <button onClick={handleClick} data-color={attributes.color}
                        data-align={attributes.align}>{attributes.label}</button>
                </div>
            </div>
        );
    },
});

