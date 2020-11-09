import { __ } from '@wordpress/i18n';
import classnames from 'classnames';
import { PanelBody } from '@wordpress/components';

const ColorBubble = (props) => {
    const {colors,current} = props;   

    const bubbles = colors.map((item)=>{
        const {label} = item; 



        const classes = classnames(
            'wps-color-bubble',
            current === item.id ? 'current':'',
            item.id
        );
        return <div 
            className={classes} 
            title={label}
            onClick={ () => {
                props.callback(item);
            }}
        ></div>
    });
    return <div className="wps-color-bubble-control">{bubbles}</div>
}

const ColorBoxIndicator = (props) => {
    
    const {colorId = ''} = props;    
    const customClasses = classnames([
        'wps-color-custom-color-box',
        colorId
    ]); 

    return (
        <div className="wps-color-custom-control-indicator">
            <div className="wps-color-custom-color-box-label">{__('Current:')}</div>
            <div className={customClasses}></div>
        </div>
    )
}


const ResetButton = (props) => {
return <div className="wps-color-custom-control-reset-holder"><button 
    type="button" 
    className="components-button wps-color-custom-control__clear is-secondary is-small"
    onClick={ () => {
        props.callback();
    }}
    >{__('Clear')}</button></div>
}


export const CustomColorSelect = (props) => {

    const {    
        title = __('Colors','wps-gutenberg-blocks'),
        colors = [],
        callback = ()=>{},
        reset = ()=>{}, 
        value = ''
    } = props;        

    return (
        <PanelBody
			title={ title }
            initialOpen={ false }
        >
        <div className="wps-color-custom-control">
            {value && <ColorBoxIndicator 
                colorId={value}
            />}
            <ColorBubble
                colors={colors}
                current={value}
                callback={callback}
            />
            {value && <ResetButton 
                callback={reset}
            />}
        </div>
        </PanelBody>
    )
}