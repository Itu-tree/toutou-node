
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import CreatableSelect from 'react-select/creatable';

const tag_options = [];
const draft_tag_options = [];


const styles = {
    menu: (styles) => Object.assign(styles, { zIndex: 1000 }),
    background: '#F5F5F5'
}

class SelectTags extends Component {
    constructor(props) {
        super(props);
        var tags = this.props.tags;
        var draft_tags = this.props.draft_tags;
        for (var i in tags) {
            tag_options.push({ value: tags[i]['name'], label: tags[i]['name'] });
        }
        if (draft_tags !== null) {
            for (var i in draft_tags) {
                draft_tag_options.push({ value: draft_tags[i]['id'], label: draft_tags[i]['name'] });
            }
        }
    }

    // handleChange = (newValue: any, actionMeta: any) => {
    //     console.group('Value Changed');
    //     console.log(newValue);
    //     console.log(`action: ${actionMeta.action}`);
    //     console.groupEnd();
    // };


    render() {
        return (
            <div className="form-group row">
                <div className="col-sm-12">
                    <CreatableSelect
                        isMulti
                        isSearchable
                        // onChange={this.handleChange}
                        defaultValue={draft_tag_options}
                        name="tags[]"
                        options={tag_options}
                        styles={styles}
                        placeholder="タグ"
                    />
                </div>
            </div>
        );
    }
}


if (document.getElementById('select_tags')) {
    let tags = JSON.parse(document.getElementById('select_tags').getAttribute('tags'));
    let draft_tags = JSON.parse(document.getElementById('select_tags').getAttribute('draft_tags'));
    ReactDOM.render(<SelectTags tags={tags} draft_tags={draft_tags} />, document.getElementById('select_tags'));
}